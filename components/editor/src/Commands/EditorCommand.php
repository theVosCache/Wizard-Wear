<?php

namespace TheVosCache\Editor\Commands;

use Illuminate\Console\Command;

class EditorCommand extends Command
{
    public $signature = 'editor';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
