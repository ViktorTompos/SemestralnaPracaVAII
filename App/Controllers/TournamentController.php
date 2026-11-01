<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class TournamentController
 * Copy of HomeController for the Tournament page
 * Handles actions related to the home page and other public actions.
 *
 * This controller includes actions that are accessible to all users, including a default landing page and a contact
 * page. It provides a mechanism for authorizing actions based on user permissions.
 *
 * @package App\Controllers
 */
class TournamentController extends BaseController
{
    /**
     * Authorizes controller actions based on the specified action name.
     *
     * In this implementation, all actions are authorized unconditionally.
     *
     * @param string $action The action name to authorize.
     * @return bool Returns true, allowing all actions.
     */
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    /**
     * Displays the tournament page which contains all the upcoming tournaments
     *
     * This action serves the main tournament page
     * For now this page is not done yet.
     *
     * @return Response The response object containing the rendered HTML for the tournament page.
     */
    public function index(Request $request): Response
    {
        return $this->html();
    }

    /**
     * Displays the detail page for a tournament (like information, banner, dates, anncouncements etc.).
     *
     * This action serves the HTML view for the tournament detail page, which is accessible to all users without any
     * authorization.
     *
     * @return Response The response object containing the rendered HTML for the tournament detail page.
     */
    public function detail(Request $request): Response
    {
        return $this->html();
    }
}
