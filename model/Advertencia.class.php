<?php

    class Advertencia{
        public $date = null;
        public $reason = null;
        public $score = null;
        public $responsible = null;
        public $dismissed = null;
        public $idmember = null;

        function __construct($id=null, $date, $reason, $score, $responsible, $dismissed, $idmember){
            $this->id = $id;
            $this->date = $date;
            $this->reason = $reason;
            $this->score = $score;
            $this->responsible = $responsible;
            $this->dismissed = $dismissed;
            $this->idmember = $idmember;
        }
        function getId(){
            return $this->id;
        }

        function setId($id){
            $this->id = $id;
        }

        function getDate(){
            return $this->date;
        }

        function setDate($date){
            $this->date = $date;
        }

        function getReason(){
            return $this->reason;
        }

        function setReason($reason){
            $this->reason = $reason;
        }

        function getScore(){
            return $this->score;
        }

        function setScore($score){
            $this->score = $score;
        }

        function getResponsible(){
            return $this->responsible;
        }

        function setResponsible($responsible){
            $this->responsible = $responsible;
        }

        function getDismissed(){
            return $this->dismissed;
        }

        function setDismissed($dismissed){
            $this->dismissed = $dismissed;
        }

        function getIdMember(){
            return $this->idmember;
        }

        function setIdMember($idmember){
            $this->idmember = $idmember;
        }
        function okay(){
            return true;
        }

    }


?>