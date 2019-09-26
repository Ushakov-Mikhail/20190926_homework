<?php

interface dvdPlayFunction
{
   public function play(); 
   public function nextChapter();
   public function stop();
}

abstract class dvdMechanicFunction implements dvdPlayFunction
{
    public function loadDisk()
    {
        echo 'Загружается диск… '.'<br><br>';
    }
    public function ejectDisk()
    {
        echo 'Выброс диска.'.'<br><br>';
    }
}

trait dvdWarning 
{
    private function loading()
    {
        echo ' Загружен…'.'<br><br>';
    }
    private function inser()
    {
        echo 'Возьмите диск'.'<br><br>';
    }
    public function play()
    {
        echo 'Воспроизведение'.'<br><br>';
    }
}

class dvdPlayer extends dvdMechanicFunction implements dvdPlayFunction
{
    use dvdWarning;
    public function loadDisk()
    {   
        echo 'Загружается диск… '.'<br><br>';
        $this->loading();
    }
    public function play()
    {
        echo 'Воспроизведение'.'<br><br>';
    }
    public function nextChapter()
    {
        echo 'Поиск следующей сцены.'.'<br><br>';
        $this->play(); 
    }
    public function stop()
    {
        echo 'Стоп.'.'<br><br>';
    }
    public function ejectDisk()
    {
        echo 'Выброс диска.'.'<br><br>';
        $this->inser();
    }
}


$player = new dvdPlayer();
$player->loadDisk();
$player->play();
$player->nextChapter();
$player->stop(); 
$player->ejectDisk();  










