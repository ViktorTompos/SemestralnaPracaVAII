<?php

namespace App\Controllers;

use App\Models\Tournament;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

/**
 * Class TournamentController
 * Akcie okolo turnajov: CRUD a staticky detail turnaja
 *
 * Prihlasenie zatial neriesim, vsetko je dostupne pre vsetkych
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
     * Read: zoznam vsetkych turnajov zoradeny podla datumu zaciatku
     */
    public function index(Request $request): Response
    {
        $tournaments = Tournament::getAll(null, [], 'start_date');
        return $this->html(['tournaments' => $tournaments]);
    }

    /**
     * Create: Prazdny formular
     */

    public function create(Request $request): Response
    {
        return $this->html(['tournament' => new Tournament(), 'error' => null], 'form');
    }

    /**
     * UPDATE: nacita turnaj podla id a zobrazi ho.
     * Ak turnaj neexistuje, vrati sa na zoznam.
     */
    public function edit(Request $request): Response
    {
        $tournament = Tournament::getOne($request->value('id'));
        if ($tournament === null) {
            return $this->redirect($this->url('tournament.index'));
        }
        return $this->html(['tournament' => $tournament, 'error' => null], 'form');
    }

    /**
     * CREATE a UPDATE: ulzoenie udajov z formulara.
     * Ak formular ma take id, upravi sa existujuci turnaj ak nie tak sa vytvara novy
     * Po ulozeni zoznam zobrazime
     */
    public function store(Request $request): Response
    {
        if (!$request->isPost()) {
            return $this->redirect($this->url('tournament.index'));
        }

        $id = $request->post('id');
        if ($id === null || $id === '') {
            $tournament = new Tournament();
        } else {
            $tournament = Tournament::getOne($id);
            if ($tournament === null) {
                return $this->redirect($this->url('tournament.index'));
            }
        }
        //Pre istotu trim funkcia kebyze dame medzery navyse
        $tournament->setName(trim((string)$request->post('name')));
        $tournament->setGame(trim((string)$request->post('game')));
        $tournament->setStartDate((string)$request->post('start_date'));
        $tournament->setLocation(trim((string)$request->post('location')));
        $tournament->setMaxTeams((int)$request->post('max_teams'));
        $tournament->setPrize((int)$request->post('prize'));

        $tournament->save();
        return $this->redirect($this->url('tournament.index'));
    }

    /**
     * DELETE: vymazeme turnaj podla id len cez post
     */
    public function delete(Request $request): Response
    {
        if ($request->isPost()) {
            $tournament = Tournament::getOne($request->post('id'));
            if ($tournament !== null) {
                $tournament->delete();
            }
        }
        return $this->redirect($this->url('tournament.index'));
    }


    /**
     * Zobrazi staticky detail turnaja
     */
    public function detail(Request $request): Response
    {
        return $this->html();
    }
}
