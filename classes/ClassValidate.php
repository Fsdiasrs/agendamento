<?php

namespace Classes;

use Models\ClassCadastro;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;
use Models\ClassLogin;
use Classes\ClassSessions;

class ClassValidate
{

    private $erro                                         = [];
    private $cadastro;
    private $password;
    private $login;
    private $tentativas;
    private $session;
    private $mail;

    public function __construct()
    {
        $this->cadastro                                   = new ClassCadastro();
        $this->password                                   = new ClassPassword();
        $this->login                                      = new ClassLogin();
        $this->session                                    = new ClassSessions();
        $this->mail                                       = new ClassMail();
    }

    #Retorno do atributo erro
    function getErro()
    {
        return $this->erro;
    }

    #Atribuí uma mensagem ao final do array erro
    function setErro($erro)
    {
        array_push($this->erro, $erro);
    }

    #Validare se os campos desejados foram preenchidos
    public function validateFields($par)
    {
        $i                                                = 0;
        foreach ($par as $key => $value) {
            if (empty($value)) {
                $i++;
            }
        }

        if ($i == 0) {
            return true;
        } else {
            $this->setErro("Preencha todos os campos");
            return false;
        }
    }

    #Validação se o dado é um email
    public function validateEmail($par)
    {
        if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->setErro("Email inválido!");
            return false;
        }
    }

    #Validare se o email existe no banco de dados (action null para cadastro)
    public function validateIssetEmail($email, $action    = null)
    {
        $b                                                = $this->cadastro->getIssetEmail($email);
        if ($action == null) {
            if ($b > 0) {
                $this->setErro("Email já cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($b > 0) {
                return true;
            } else {
                $this->setErro("Email não cadastrado!");
                return false;
            }
        }
    }

    #Validação se o dado é uma data
    public function validateData($par)
    {
        $data                                             = \DateTime::createFromFormat("d/m/Y", $par);
        if (($data) && ($data->format("d/m/Y") === $par)) {
            return true;
        } else {
            $this->setErro("Data inválida!");
            return false;
        }
    }

    #Validação se a data é igual a data do banco de dados
    public function validateDataNascimento($dataNascimento, $email)
    {
        $dataDb                                           = $this->login->getDataUser($email)["data"]["dataNascimento"];
        if ($dataNascimento == $dataDb) {
            return true;
        } else {
            $this->setErro("Data de nascimento não confere com o usuário!");
            return false;
        }
    }

    #Validação se é um cpf real
    public function validateCpf($par)
    {
        $cpf                                              = preg_replace('/[^0-9]/', '', (string) $par);
        if (strlen($cpf) != 11) {
            $this->setErro("Cpf Inválido!");
            return false;
        }
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma                                         += $cpf[$i] * $j;
        $resto                                        = $soma % 11;
        if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto)) {
            $this->setErro("Cpf Inválido!");
            return false;
        }
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma                                         += $cpf[$i] * $j;
        $resto                                        = $soma % 11;
        return $cpf[10] == ($resto < 2 ? 0 : 11 - $resto);
    }

    #Verificar se a senha é igual a confirmação de senha
    public function validateConfSenha($senha, $senhaConf)
    {
        if ($senha === $senhaConf) {
            return true;
        } else {
            $this->setErro("Senha diferente de confirmação de senha!");
            return false;
        }
    }

    #Verificar a força da senha
    public function validateStrongSenha($senha, $par      = null)
    {
        $zxcvbn                                           = new Zxcvbn();
        $strength                                         = $zxcvbn->passwordStrength($senha);

        if ($par == null) {
            if ($strength['score'] >= 3) {
                return true;
            } else {
                $this->setErro("Utilize uma senha mais forte");
            }
        } else {
            /*Login*/
        }
    }

    #Verificação da senha digitada com o hash no banco de dados
    public function validateSenha($email, $senha)
    {
        if ($this->password->verifyHash($email, $senha)) {
            return true;
        } else {
            $this->setErro("Usuário ou Senha Inválidos!");
            return false;
        }
    }

    #Verifica se o captcha está correto
    public function validateCaptcha($captcha, $score      = 0.2)
    {
        $return = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRETKEY . "&response={$captcha}");
        $response = json_decode($return);
        if ($response->success == true && $response->score >= $score) {
            return true;
        } else {
            $this->setErro("Captcha Inválido! Atualize a página e tente novamente.");
            return false;
        }
    }

    #Validação das tentativas
    public function validateAttemptLogin()
    {
        if ($this->login->countAttempt() >= 5) {
            $this->setErro("Você realizou mais de 5 tentativas.");
            $this->tentativas                             = true;
        } else {
            $this->tentativas                             = false;
            return true;
        }
    }

    #Método de validação de confirmação de email
    public function validateUserActive($email)
    {
        $user                                            = $this->login->getDataUser($email);
        if ($user["data"]["status"] == "confirmation") {
            if (strtotime($user["data"]["dataCriacao"]) <= strtotime(date("Y-m-d H:i:s")) - 432000) {
                $this->setErro("Ative seu cadastro pelo link do email");
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    #Validação final do cadastro
    public function validateFinalCad($arrVar)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            $this->mail->sendMail(
                $arrVar['email'],
                $arrVar['nome'],
                $arrVar['token'],
                "Confirmação de Cadastro",
                "
                <strong>Cadastro App Agendamento de Consultas</strong><br>
                Confirme seu email <a href = '" . DIRPAGE . "controllers/controllerConfirmation/{$arrVar['email']}/{$arrVar['token']}'>Clicando aqui</a>
                "
            );
            $arrResponse = [
                "retorno" => "success",
                "page" => 'login',
                "erros" => null
            ];
            $this->cadastro->insertCad($arrVar);
        }
        return json_encode($arrResponse);
    }


    #Validação final do cadastro
    public function validateFinalEdit($arrVarUser,$id)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            
            $arrResponse = [
                "retorno" => "success",
                "page" => 'login',
                "erros" => null
            ];
            $this->cadastro->updateCad($arrVarUser, $id);
        }
        return json_encode($arrResponse);
    }



    public function confirmaConsulta($arrVarEvents)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            $this->mail->sendMail(
                $arrVarEvents['emailEmp'],
                $arrVarEvents['title'],
                $arrVarEvents['token'],
                "Confirmação de Consulta",
                "
                <strong>Confirmação de Consulta</strong><br>
                Confirmamos que o funcionário(a) {$arrVarEvents['title']}, compareceu ao HUSFP para uma consulta na data de {$arrVarEvents['date']}<br>
                 e teve uma consulta de {$arrVarEvents['horasAtendimento']} minutos.
                "
            );
            $arrResponse = [
                "retorno" => "success",
                "page" => 'login',
                "erros" => null
            ];
        }
        return json_encode($arrResponse);
    }

    #Validação final do login
    public function validateFinalLogin($email)
    {
        if (count($this->getErro()) > 0) {
            $this->login->insertAttempt();

            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro(),
                "tentativas" => $this->tentativas
            ];
        } else {
            $this->login->deleteAttempt();
            $this->session->setSessions($email);
            if ($this->login->getDataUser($email)['data']['permissoes'] == "user") {
                $arrResponse = [
                    "retorno" => "success",
                    "page" => 'calendarUser',
                    "permitions" => 'permissoes',
                    "tentativas" => $this->tentativas
                ];
            } else {
                $arrResponse = [
                    "retorno" => "success",
                    "page" => 'calendarManager',
                    "permitions" => 'permissoes',
                    "tentativas" => $this->tentativas
                ];
            }
        }

        return json_encode($arrResponse);
    }

    #Validação final do cadastro
    public function validateFinalSen($arrVar)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            $this->mail->sendMail(
                $arrVar['email'],
                $arrVar['nome'],
                $arrVar['token'],
                "Link para redefinição de Senha",
                "
                <strong>Redefinação da Senha</strong><br>
                Redefina sua senha <a href                = '" . DIRPAGE . "redefinicaoSenha/{$arrVar['email']}/{$arrVar['token']}'>clicando aqui</a>.
                "
            );
            $arrResponse = [
                "retorno" => "success",
                "page" => 'login',
                "erros" => null
            ];
            $this->cadastro->insConfirmation($arrVar);
        }
        return json_encode($arrResponse);
    }
}
