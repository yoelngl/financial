<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Barang extends Component
{

    public $month;
    public $step_2 = true;
    public $price_input;
    public $price;
    public $step_3 = true;
    public $down_payment = 10;
    public $step_4 = true;
    public $dp_number;
    public $loan_percent;
    public $loan_number;
    public $inflation_year = 5;
    public $inflation_show;
    public $step_5 = true;
    public $money;
    public $money_input;
    public $invest;
    public $invest_input;
    public $step_6 = true;
    public $invest_return;
    public $step_7 = true;

    protected $listeners = ['price_show','money_show','invest_show'];

    public function price_show($number){
        $this->price = $number;
    }

    public function money_show($number){
        $this->money = $number;
    }

    public function invest_show($number){
        $this->invest = $number;
    }

    public function currentState(){
        $this->price = '';
        $this->down_payment = '';
    }

    public function updated(){
        if($this->month){
            $this->step_2 = false;
            if(strlen($this->price_input) > 7){
                $this->step_3 = false;
                if($this->down_payment <= 100 && $this->down_payment >= 1){
                    $this->resetValidation();
                    if($this->down_payment){
                        $this->step_4 = false;
                        $discount = $this->down_payment / 100;
                        $this->dp_number = $this->price * $discount;
                        $this->loan_percent = 100 - $this->down_payment;
                        $this->loan_number = $this->price - $this->dp_number;
                        if($this->inflation_year){
                            $this->inflation_show = $this->dp_number + (83 * $this->inflation_year) ;
                        }else{
                            $this->inflation_show = $this->dp_number;
                        }
                        if($this->money_input){
                            $this->step_5 = false;
                            if($this->invest_input){
                                $this->step_6 = false;
                                if($this->invest_return){
                                    $this->step_7 = false;
                                }else{
                                    $this->step_7 =true;
                                }
                            }else{
                                $this->step_6 = true;
                                $this->step_7 = true;
                            }
                        }else{
                            $this->step_6 = true;
                            $this->step_5 = true;
                        }
                    }
                }else{
                    $this->step_4 = true;
                    $this->step_5 = true;
                    throw ValidationException::withMessages(['down_payment' => 'DP Tidak boleh lebih dari 100% maupun 0%']);
                }
            }else{
                $this->step_3 = true;
                $this->step_4 = true;
                $this->step_5 = true;
            }
        }else{
            $this->step_2 = true;
            $this->step_3 = true;
            $this->step_4 = true;
            $this->step_5 = true;
            $this->currentState();
        }
    }

    public function render()
    {
        return view('livewire.pages.barang')->extends('livewire.layouts.app')->section('content');
    }
}
