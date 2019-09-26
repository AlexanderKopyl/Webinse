<?php


namespace classDB\db;


class Validator
{
    public $json = array();
    protected $data_validation = array();
    protected $RegName = "/^[a-zA-Zа-яА-Я']{2}[a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u";

    public function __construct($data)
    {
        $this->data_validation = $data;
    }
    public function validationUpdate(){

        if (isset($this->data_validation['value'])) {
            if (trim($this->data_validation['value']) === '') {
                $this->json['error']['value'] = "У вас пустое поле";
            }
        }

        if (isset($this->data_validation['attrName']) && isset($this->data_validation['table'])) {
            if($this->data_validation['attrName'] ==='first_name' || $this->data_validation['attrName'] ==='second_name' ){
                if (!preg_match($this->RegName, trim($this->data_validation['value']))) {
                    $this->json['error'][trim($this->data_validation['table'])] = 'Введите коректно Поле: ' . $this->data_validation['table'];
                }
            }
        }

        if (isset($this->data_validation['attrName']) && $this->data_validation['attrName'] === 'email'){
            if ((mb_strlen( trim($this->data_validation['value'])) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',  trim($this->data_validation['value']))) {
                $this->json['error']['email'] = "Некоректнный ввод Емейла";
            }
        }

        return $this->json;
    }

    public function validationAdd(){

        if (isset($this->data_validation['first_name'])) {
            if ((mb_strlen($this->data_validation['first_name']) < 3) || (mb_strlen($this->data_validation['first_name']) > 32)) {
                $this->json['error']['first_name'] = "Некоректнный ввод имени";
            }
        }

        if (isset($this->data_validation['second_name'])) {
            if ((mb_strlen($this->data_validation['second_name']) < 3) || (mb_strlen($this->data_validation['second_name']) > 32)) {
                $this->json['error']['second_name'] = "Некоректнный ввод Фамилии";
            }
        }

        if ((mb_strlen($this->data_validation['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->data_validation['email'])) {
            $this->json['error']['email'] = "Некоректнный ввод Емейла";
        }

        return $this->json;
    }

}