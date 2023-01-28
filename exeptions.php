<?php

function foo(): bool
{
    try {
        throw new Exception('common error');
    } catch (Exception $exception) {
        echo $exception->getMessage();
        return false;
    }

    return true;
}
