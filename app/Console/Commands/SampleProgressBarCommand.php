<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Class SampleProgressBarCommand プログレスバー表示を行うコマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleProgressBarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:progress-bar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'プログレスバー表示のサンプルコマンドアプリケーション';

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
        $count = 5;

        // 標準的なプログレスバー
        {
            $progressBar = $this->output->createProgressBar($count);
            $i = 0;
            while ($i++ < $count) {
                $this->processing();
                $progressBar->advance();
            }
            $progressBar->finish();
        }

        echo PHP_EOL;

        // プログレスバーのデザイン変更
        {
            $progressBar = $this->output->createProgressBar($count);
            $progressBar->setBarCharacter('>');
            $progressBar->setEmptyBarCharacter('-');
            $progressBar->setProgressCharacter('!');
            $i = 0;
            while ($i++ < $count) {
                $this->processing();
                $progressBar->advance();
            }
            $progressBar->finish();
        }

        echo PHP_EOL;

        // プレースホルダーでメッセージを定義して表示
        {
            $i = 0;
            $progressBar = $this->output->createProgressBar($count);
            $progressBar->setFormatDefinition('custom', ' %current%/%max% -- %message% (%currentNo%)');
            $progressBar->setFormat('custom');
            while ($i++ < $count) {
                $this->processing();
                $progressBar->setMessage('processing...');
                $progressBar->setMessage('No.' . $i, 'currentNo');
                $progressBar->advance();
            }
            $progressBar->finish();
        }

        echo PHP_EOL;
    }

    /**
     * 擬似的な処理 サンプルなのでバーの表示を見やすくするために遅延をさせる
     */
    private function processing()
    {
        sleep(1);
    }
}
