<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;

class DeployController extends Controller
{
    /**
     * ------------------------------------
     * Deploy project from Git repository |
     * ------------------------------------
     * @param $requestDeployName
     * @param $requestDeployEnv
     * @return string|void
     *
     */

    public function deploy($requestDeployName, $requestDeployEnv)
    {
        $deployName = env('DEP_NAME');
        $deployEnv = env('DEP_ENV');

        if ($requestDeployName != $deployName && $requestDeployEnv != $deployEnv) {
            return abort(404);
        }

        $arrGitCommands = [
            'sudo whoami',
            'sudo git pull',
            'sudo git status',
//            'php ../artisan cache:clear',
//            'php ../artisan route:clear',
//            'php ../artisan view:clear',
        ];

        $sOutput = '';
        foreach ($arrGitCommands as $gitCommand) {
            $sTmp = shell_exec($gitCommand . ' 2>&1');
            $sOutput .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">" . $gitCommand . "\n</span>";
            $sOutput .= htmlentities(trim($sTmp)) . '<br>';
        }

        return '<pre>' . $sOutput . '</pre>';
    }
}
