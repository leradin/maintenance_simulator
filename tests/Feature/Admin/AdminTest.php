<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{

	/** @test */
    function admins_can_visit_the_admin_home(){

    }

    /** @test */
    function non_admin_users_cannot_visitr_the_admin_home(){

    }

    /** @test */
    function guest_cannot_visit_the_admin_home(){

    }
}
