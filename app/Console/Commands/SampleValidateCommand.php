<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Validation\ValidationException;

/**
 * Class SampleValidateCommand validationを行うコマンドクラスのサンプル
 * @package App\Console\Commands
 */
class SampleValidateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:validate {name : 名前を指定} {age? : 年齢を指定}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'validationを行うサンプルコマンドアプリケーション';

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

        try {

            $this->validate();

        } catch (ValidationException $e) {
            $this->error('validation error!');
            foreach ($e->validator->getMessageBag()->all() as $error) {
                $this->error($error);
            }
            return config('command.exit_code.ERROR');
        }

        $this->info('end');
        return config('command.exit_code.SUCCESS');
    }

    /**
     * Validation
     */
    private function validate()
    {
        \Validator::validate(
            array_filter($this->arguments()),
            [
                'name' => 'max:10',
                'age' => 'numeric|min:20',
            ],
            [
                'name.max' => '名前は10文字以内で入力してください',
                'age.numeric' => '年齢は数値を入力してください',
                'age.min' => '年齢は20才以上で入力してください'
            ]
        );
    }
}
