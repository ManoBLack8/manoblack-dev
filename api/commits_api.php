<?php

function get_github_commits($username, $repo_name) {
    $url = "https://api.github.com/repos/{$username}/{$repo_name}/commits";
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: PHP'
        ]
    ];
    
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    if ($response !== false) {
        $commits = json_decode($response, true);
        return $commits;
    } else {
        echo "Erro ao obter os commits.";
        return null;
    }
}

$username = "ManoBLack8";
$repo_name = "manoblack-dev";

echo get_github_commits($username, $repo_name);