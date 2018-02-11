<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MPWAR5\Command;

/**
 *
 * @author oylla
 */
interface ICounterRepository {
    public function getCount();
    public function setCount($count):void;
}
