<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SampleConsoleOutputCommand コンソール出力を行うコマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleConsoleOutputCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:console-output';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'コンソール出力のサンプルコマンドアプリケーション';

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
        $this->info('info');
        $this->line('line');
        $this->comment('comment');
        $this->question('question');
        $this->error('error');

        $this->table(
            ['名前', '年齢'],
            [
                ['Taro', 10],
                ['Laravel', 5],
            ]
        );
    }
}
