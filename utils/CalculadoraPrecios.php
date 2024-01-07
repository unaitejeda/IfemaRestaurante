<?php
// Clase que implementa una calculadora de precios para pedidos
Class CalculadoraPrecios{

    // Método estático para calcular el precio total de un array de pedidos
    public static function calculadorPrecioPedido($pedidos){
        $precioTotal = 0;
        
        // Suma los precios de cada pedido en el array
        foreach($pedidos as $pedido){
            $precioTotal += $pedido->devuelvePrecio();
        }

        return $precioTotal;
    }
}