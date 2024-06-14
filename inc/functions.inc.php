<?php

function redirection(string $url) {
    header("Location: $url");
    exit;
}

function addMessage(string $type, string $message) {
    $_SESSION["messages"][] = [ $type, $message ];
}


function deleteMessages() {
    $_SESSION["messages"] = [];
}