<?php
public function edit($id)
    {
        return view('project.edit',[

            'project' => Project::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $project = Project::find($request->id);
        $project->project_name = $request->input('project_name');
        $project->client = $request->input('client');
        $project->description = $request->input('description');
        $project->time_span = $request->input('time_span');
        $project->text_report = $request->input('text_report');
        $project->created_by = $request->input('created_by');

        $project->save();

        return  redirect('/')->with('success', 'Project aangepast');
    }
?>