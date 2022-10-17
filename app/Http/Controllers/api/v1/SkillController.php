<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\api\v1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    
    public function index()
    {
        $skills = SkillResource::collection(Skill::all()) ;
        return response()->json(
            [
                'skills'=>$skills
            ]

            );

    }


    public function store(StoreSkillRequest $request)
    {
       $skill = Skill::create($request->validated());
       return response()->json(
        [
            'skill'=>$skill
        ]

        );
    }

    public function update(StoreSkillRequest $request , Skill $skill)
    {
       $skill->update($request->validated());

       return  response()->json(
        [
            'skill'=>$skill
        ]

        );
    }
    public function show(Skill $skill)
    {

        $skill = new SkillResource($skill);
        return  response()->json(
            [
                'skill'=>$skill
            ]
    
            );
    }


    public function destroy(Skill $skill)
    {
        $skill->delete();
        return  response()->json(
            [
                'message'=>"skill deleted successfully"
            ]
    
            );
    }
}
