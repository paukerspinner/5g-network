<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NetworkNodesResource;
use App\NetworkNode;
use App\QualityEvaluation;

class NetworkNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $network_nodes = NetworkNode::all(); //new NetworkNodesResource(NetworkNode::all());
        return view('pages.network_nodes.map')
            ->with('network_nodes', $network_nodes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $network_node = NetworkNode::with('evaluations')->find($id);
        // dd(json_encode($network_node));
        return view('pages.network_nodes.details')
            ->with('network_node', $network_node);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import() {
        return view('pages.network_nodes.import');
    }

    public function saveData(Request $request) {
        $old_network_nodes = NetworkNode::all();

        $validated = $request->validate([
            'file' => 'required'
        ]);

        $file = $request->file;
        $handle = fopen($file->getRealPath(), 'r');
        $row = fgetcsv($handle);
        while( !feof($handle)) {
            $record = fgetcsv($handle);
            if ($record !== false) {
                $address = $record[0];
                $qual_values = array_slice($record, 1);
                
                $network_node = NetworkNode::create([
                    'address' => $address
                ]);
                foreach ($qual_values as $idx => $value) {
                    QualityEvaluation::create([
                        'network_node_id' => $network_node->id,
                        'evaluation_criteria_id' => $idx + 1,
                        'value' => $value
                    ]);
                }
            }
        }
        if ($request->get('reset_data') == true) {
            $old_network_nodes->each->delete();
        }
        return redirect('/network-nodes');
    }
}
