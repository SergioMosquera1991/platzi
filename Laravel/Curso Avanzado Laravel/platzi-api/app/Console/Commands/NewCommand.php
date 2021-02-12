<?php

namespace App\Console\Commands;

use App\Notifications\NewNotification;
use Illuminate\Console\Command;
use App\User;

class NewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newCommand {emails?*}: Correos Electronicos a los cuales enviar directamente
    {--s|schedule : Si debe ser ejecutado directamente o no}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un correo electrónico';

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
     * @return int
     */
    public function handle()
    {
        $userEmails = $this->argument('emails');
        $schedule = $this->option('schedule');

        $builder = User::query();

        if ($userEmails) {
            $builder->whereIn('email', $userEmails);
        }

        $builder->whereNotNull('email_verified_at');
        $count = $builder->count();

        if ($count) {
            $this->info("Se enviaran {$count} correos");

            if ($this->confirm('¿Estas de acuerdo?') || $schedule) {
                $this->output->progressStart($count);
                $builder->each(function (User $user) {
                    $user->notify(new NewNotification());
                    $this->output->progressAdvance();
                });
                $this->output->progressFinish();
                $this->info('Correos enviados');
                return;
            }
        }

        $this->info('No se enviaron correos');
    }
}
