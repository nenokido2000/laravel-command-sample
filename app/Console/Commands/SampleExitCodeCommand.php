<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SampleExitCodeCommand 終了時コード返却を行うコマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleExitCodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:exit-code {--force-error : 強制的にエラー扱いにする}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '終了時コード返却のサンプルコマンドアプリケーション';

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

        if ($this->option('force-error')) {
            $this->error('error!');
            return config('command.exit_code.ERROR');
        }

        $this->info('end');
        return config('command.exit_code.SUCCESS');
    }
}
