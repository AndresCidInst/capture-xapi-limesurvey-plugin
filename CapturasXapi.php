<?php
/**
 * @file CapturasXapi.php
 * @brief Plugin para capturar eventos de la encuesta.
 *
 * Este plugin captura el eventos de la encuesta y ejecuta código JavaScript.
 * El código JavaScript se puede utilizar para capturar los diferentes eventos de la encuesta
 * y enviar un mensaje xAPI a un LRS.
 *
 * @version 1.0.0
 * @date 2021-05-10
 * 
 * Plugin Name: Capturar Inicio
 * */

class CapturarInicio extends PluginBase {
    static protected $name = 'CapturarXapi';
    static protected $description = 'Captura xAPI de los diferentes eventos de la encuesta';

    public function init() {
        // Suscribirse al evento que se activa antes del inicio de la encuesta.
        $this->subscribe('beforeSurveyPage');
    }

    public function beforeSurveyPage() {
        $js = <<<EOD
            console.log('La encuesta ha comenzado.');
            // Aquí puedes agregar más código JavaScript que desees ejecutar al inicio de la encuesta.
        EOD;

        // Inyecta el JavaScript en la encuesta.
        $this->getEvent()->set('script', $js);
    }
}



