<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SampleInteractiveCommand 対話型コマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleInteractiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:interactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '対話型のサンプルコマンドアプリケーション';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('start');

        $name = $this->ask('名前を入力してください');
        $age = $this->ask('年齢を入力してください');

        $this->info("名前 : $name");
        $this->info("年齢 : $age");
        if ($this->confirm('この内容で実行してよろしいですか?')) {
            $this->info("$name $age years old");
        } else {
            $this->info('cancel');
        }

        $this->info('end');
    }
}
