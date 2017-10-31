<?php

function currentUser()
{
    return "Lenin";
}

function isActive($path)
{
	return Request::is($path.'/*');
}