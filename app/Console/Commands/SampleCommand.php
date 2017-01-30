<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class SampleCommand 基本的なコマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:sample {name} {--g|greeting=Hello : 挨拶を指定}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンドアプリケーション';

    private $messageCreator;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MessageCreator $messageCreator)
    {
        parent::__construct();
        $this->messageCreator = $messageCreator;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('start');
        $this->line(
            $this->messageCreator->create($this->argument('name'), $this->option('greeting'))
        );
        $this->info('end');
    }
}
