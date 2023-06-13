<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnimeModel;

class Animes extends BaseController
{
    protected $animeModel;

    public function __construct()
    {
        $this->animeModel = new AnimeModel();
    }

    public function index()
    {
        $animeList = $this->animeModel->getAnime();

        $data = [
            "title" => "Anime List",
            "animeList" => $animeList,
        ];

        return view("Animes/index", $data);
    }

    public function detail($slug)
    {
        $data = [
            "title" => "Anime Detail",
            "animeDetail" => $this->animeModel->getAnime($slug),
        ];

        if (empty($data["animeDetail"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Anime Details not found!!!");
        }

        return view("Animes/detail", $data);
    }

    public function createData()
    {
        $data = [
            "title" => "Create Form",
            "validation" => session()->getFlashdata("validation")
        ];

        return view("Animes/create", $data);
    }

    public function saveData()
    {

        // Validating Data, if data is not valid will redirect to create anime Data page
        if (!$this->validate($this->getValidCreateRules())) {
            session()->setFlashdata("validation", $this->validator);
            return redirect()->to("/animes/create")->withInput();
        }

        $cData = $this->request->getVar();
        $slug = url_title($cData["title"]);
        $this->animeModel->save([
            "title" => $cData["title"],
            "slug" => $slug,
            "author" => $cData["author"],
            "studio" => $cData["studio"],
            "cover" => $cData["cover"],
        ]);

        session()->setFlashdata("message", "Data is created");
        return redirect()->to("/animes");
    }

    public function editData($slug)
    {
        $data = [
            "title" => "Edit Anime Data",
            "validation" => session()->getFlashdata("validation"),
            "anime" => $this->animeModel->getAnime($slug)
        ];

        return view("animes/edit", $data);
    }

    // Param taking $id since we need primary key of the model to change the data
    public function updateData($id)
    {
        $cData = $this->request->getVar();
        $prevData = $this->animeModel->getAnime($cData["slug"]);

        $cValidateRules = $this->getValidCreateRules();

        // Update the rules if the input title is the same
        if ($prevData["title"] == $cData["title"])
            $cValidateRules["title"]["rules"] = "required";

        // Validating Data, if data is not valid will redirect to edit anime Data page
        if (!$this->validate($cValidateRules)) {
            session()->setFlashdata("validation", $this->validator);
            return redirect()->to("/animes/edit/" . $cData["slug"])->withInput();
        }

        $slug = url_title($cData["title"]);
        $this->animeModel->save([
            "id" => $id,
            "title" => $cData["title"],
            "slug" => $slug,
            "author" => $cData["author"],
            "studio" => $cData["studio"],
            "cover" => $cData["cover"],
        ]);

        session()->setFlashdata("change_msg", "Data is Edited");
        return redirect()->to("/animes/$slug");
    }

    // Param taking $id since we need primary key of the model to change the data
    public function deleteData($id)
    {
        $this->animeModel->delete($id);
        session()->setFlashdata("message", "Data is deleted");
        return redirect()->to("/animes");
    }

    private function getValidCreateRules()
    {
        return [
            "title" => [
                "rules" => "required|is_unique[animelist.title]",
                "errors" => [
                    "required" => "{field} needed to be filled!",
                    "is_unique" => "{field} need to be unique!"
                ]
            ],
            "author" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} needed to be filled!",
                ]
            ],
            "studio" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} needed to be filled!",
                ]
            ],
        ];
    }
}
