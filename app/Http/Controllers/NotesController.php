<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function __construct() {
        $this->notesdb = new \Filebase\Database([
            'dir'            => storage_path('db/notes'),
            'format'         => \Filebase\Format\Json::class,
            'cache'          => true,
            'cache_expires'  => 1800,
            'pretty'         => true,
            'safe_filename'  => true,
            'read_only'      => false,
            'validate' => [
                'id'   => [
                    'valid.type' => 'string',
                    'valid.required' => true
                ],
                'title'   => [
                    'valid.type' => 'string',
                    'valid.required' => true
                ],
                'note'   => [
                    'valid.type' => 'string',
                    'valid.required' => true
                ]
            ]
        ]);
    }

    public function index() {

        // Pull all Filebase Documents
        $notes = $this->notesdb->findAll();

        if($notes) {
            $notes_array = array();
            foreach($notes as $note) {
                $array = array(
                    'id' => $note->id,
                    'title' => $note->title,
                    'note' => $note->note
                );

                array_push($notes_array, $array);
            }

            $json = json_encode($notes_array);

            return $json;

        } else {
            return 'There are currently no notes';
        }
        
    }

    public function save(Request $request) {

        // Set unique id for Document
        $uid = uniqid();

        // Create new Document
        $note = $this->notesdb->get($uid);

        // Populate date from POST inputes
        $note->id = $uid;
        $note->title  = $request->input('title');
        $note->note  = $request->input('note');

        // Save new Filebase Document
        $note->save();

        return 'Sucess :: Note ID: ' . $uid . ' Title: ' . $request->input('title') . ' has been saved';
    }

    public function view($id) {

        // Pull all Filebase Documents
        $note = $this->notesdb->get($id);

        if($note) {
            $notes_array = array(
                'id' => $note->id,
                'title' => $note->title,
                'note' => $note->note
            );

            $json = json_encode($notes_array);

            return $json;

        } else {

            return 'Error :: Not ID: ' . $id . ' does not exist';

        }
        
    }

    public function update($id, Request $request) {

        // Pull all Filebase Documents
        $note = $this->notesdb->get($id);

        if($note) {


            // Populate date from POST inputes
            $note->title  = $request->input('title');
            $note->note  = $request->input('note');

            // Save new Filebase Document
            $note->save();

            return 'Success :: ID: ' . $id . ' has been updated';

        } else {

            return 'Error :: Not ID: ' . $id . ' does not exist';

        }

    }

    public function delete($id) {

        // Pull all Filebase Documents
        $note = $this->notesdb->get($id);

        if($note) {

            $note->delete();

            return 'Success :: Note ID: ' . $id . ' has been removed';

        } else {

            return 'Error :: Not ID: ' . $id . ' does not exist';

        }

        return print_r($note, true);
    }
}
