@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div id="mynetwork"></div>
    </div>
@endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #mynetwork {
          width: 100%;
          height: 100vh;
          margin: 4px;
        }
      </style>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>

<script>
    var network_nodes = @json($network_nodes);

    let nodes_data = [];
    network_nodes.forEach(network_node => {
        console.log(network_node)
        let main_node = {
            id: network_node.id,
            label: network_node.address,
            value: 10,
            color: { background: '#b2dfdb'}, font: {size: 30}
        }
        let embb_node = {
            id: network_node.id + '.1',
            value: 5,
            label: 'eMBB',
            color: { background: network_node.enable_embb ? '#00C851' : '#ff4444' }, font: {size: 10}
        }
        let mmtc_node = {
            id: network_node.id + '.2',
            value: 5,
            label: 'mMTC',
            color: { background: network_node.enable_mmtc ? '#00C851' : '#ff4444' }, font: {size: 10}
        }
        let urllc_node = {
            id: network_node.id + '.3',
            value: 5,
            label: 'URLLC',
            color: { background: network_node.enable_urllc ? '#00C851' : '#ff4444' }, font: {size: 10}
        }
        nodes_data = nodes_data.concat([main_node, embb_node, mmtc_node, urllc_node]);
    });

    var nodes = new vis.DataSet(nodes_data);

    // create an array with edges
    let edges_data = [];
    for (let i = 0; i < network_nodes.length; i++) {
        for (let j = i + 1; j < network_nodes.length; j++) {
            edges_data = edges_data.concat(
                { from: network_nodes[i].id, to: network_nodes[j].id, length: 800 }
            )
        }
        edges_data = edges_data.concat([
            { from: network_nodes[i].id, to: network_nodes[i].id + '.1', length: 50},
            { from: network_nodes[i].id, to: network_nodes[i].id + '.2', length: 50},
            { from: network_nodes[i].id, to: network_nodes[i].id + '.3', length: 50},
        ])
    }
    let edges = new vis.DataSet(edges_data);

    // create a network
    var container = document.getElementById('mynetwork');

    // provide the data in the vis format
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {
        nodes: {
            size: 30,
            shape: 'square',
            borderWidth: 1,
            shadow: true,
            margin: {
                top: 50,
                left: 50,
                right: 50,
                bottom: 50
            },
            color: {
                highlight: '#c4c4c4'
            }
        },
        edges: {
            chosen: true,
            smooth: {
                enabled: false
            },
            color: {
                color: "#b2dfdb",
                highlight:'#b2dfdb',
                hover: '#848484',
            }
        },
        physics: {
            enabled: true,
            repulsion: {
                nodeDistance: 100
            },
            hierarchicalRepulsion: {
                nodeDistance: 100
            },
        }
    };

        // initialize your network!
    var network = new vis.Network(container, data, options);
    network.stabilize()

    console.log(network.getOptionsFromConfigurator())

    // network.selectNodes([]);

    network.on('click', params => {
        var nodeID = params['nodes']['0'];
        if (parseInt(nodeID) == nodeID) {
            window.location.href = `/network-nodes/${nodeID}`;
        }
    })

      network.on("initRedraw", function () {
        // do something like move some custom elements?
      });
      network.on("beforeDrawing", function (ctx) {

      });
      network.on("afterDrawing", function (ctx) {
        //var nodeId = 1;
        //var nodePosition = network.getPositions([nodeId]);
        //roundRect(ctx, nodePosition[nodeId].x-70, nodePosition[nodeId].y-70, 150, 120, 40, true);
      });

    //   function roundRect(ctx, x, y, width, height, radius, fill, stroke) {
    //     if (typeof stroke == 'undefined') {
    //       stroke = true;
    //     }
    //     if (typeof radius === 'undefined') {
    //       radius = 5;
    //     }
    //     if (typeof radius === 'number') {
    //       radius = {tl: radius, tr: radius, br: radius, bl: radius};
    //     } else {
    //       var defaultRadius = {tl: 0, tr: 0, br: 0, bl: 0};
    //       for (var side in defaultRadius) {
    //         radius[side] = radius[side] || defaultRadius[side];
    //       }
    //     }
    //     // ctx.beginPath();
    //     // ctx.moveTo(x + radius.tl, y);
    //     // ctx.lineTo(x + width - radius.tr, y);
    //     // ctx.quadraticCurveTo(x + width, y, x + width, y + radius.tr);
    //     // ctx.lineTo(x + width, y + height - radius.br);
    //     // ctx.quadraticCurveTo(x + width, y + height, x + width - radius.br, y + height);
    //     // ctx.lineTo(x + radius.bl, y + height);
    //     // ctx.quadraticCurveTo(x, y + height, x, y + height - radius.bl);
    //     // ctx.lineTo(x, y + radius.tl);
    //     // ctx.quadraticCurveTo(x, y, x + radius.tl, y);
    //     // ctx.closePath();
    //     if (fill) {
    //       ctx.fill();
    //     }
    //     if (stroke) {
    //       ctx.stroke();
    //     }

    //     ctx.strokeText("AAA",x,y);
    //   }
</script>
@endsection