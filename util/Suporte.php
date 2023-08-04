<?php

class Suporte
{
    public function usuarioOnline()
    {
        if ($_SESSION['usuario']['id'] >= 0) {
            return 1;
        }
        return 0;
    }
}