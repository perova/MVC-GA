<?php

class Stats extends Controller {

    public function index() {
        $game = $this->model('Game');

        $data['title'] = "CA Dice Game";
        $data['header'] = "My Stats";
        $data['body'] = "This is all my game statistics";
        $data['my_stats']= $game->getUserGames("Jonas3435");

        $this->view("stats/index", $data);
    }

    public function tops() {

        $data['title'] = "CA Dice Game";
        $data['header'] = "Top players";
        $data['body'] = "Here we have best wins and top gamers.";

        $this->view("stats/tops", $data);
    }


}