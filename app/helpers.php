<?php

/**
 * @return \genesis50\Entities\User
 *
 */

function currentUser()
{
	return auth()->user();
}
