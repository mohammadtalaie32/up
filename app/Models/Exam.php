<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	protected $fillable = [
		'patient_id',
        'zv0observed',
        'zv0painint',
        'zv0notes',
        'zv1observed',
        'zv1painint',
        'zv1notes',
        'zv2observed',
        'zv2painint',
        'zv2notes',
        'zv3observed',
        'zv3painint',
        'zv3notes',
        'zv4observed',
        'zv4painint',
        'zv4notes',
        'zv5observed',
        'zv5painint',
        'zv5notes',  //Cervical
        'ov0observed',
        'ov0painint',
        'ov0notes',
        'ov1observed',
        'ov1painint',
        'ov1notes',
        'ov2observed',
        'ov2painint',
        'ov2notes',
        'ov3observed',
        'ov3painint',
        'ov3notes',
        'ov4observed',
        'ov4painint',
        'ov4notes',
        'ov5observed',
        'ov5painint',
        'ov5notes',   //Lumbar
        'tv0observed',
        'tv0painint',
        'tv0notes',
        'tv1observed',
        'tv1painint',
        'tv1notes',
        'tv2observed',
        'tv2painint',
        'tv2notes',
        'tv3observed',
        'tv3painint',
        'tv3notes',
        'tv4observed',
        'tv4painint',
        'tv4notes',  //Thoracic
        'shoulder',
        'thv0observed',
        'thv0painint',
        'thv0notes',
        'thv1observed',
        'thv1painint',
        'thv1notes',
        'thv2observed',
        'thv2painint',
        'thv2notes',
        'thv3observed',
        'thv3painint',
        'thv3notes',
        'thv4observed',
        'thv4painint',
        'thv4notes',
        'thv5observed',
        'thv5painint',
        'thv5notes', //shouldert
        'wrist',
        'fiv0observed',
        'fiv0painint',
        'fiv0notes',
        'fiv1observed',
        'fiv1painint',
        'fiv1notes',
        'fiv2observed',
        'fiv2painint',
        'fiv2notes',
        'fiv3observed',
        'fiv3painint',
        'fiv3notes',
        'fiv4observed',
        'fiv4painint',
        'fiv4notes',
        'fiv5observed',
        'fiv5painint',
        'fiv5notes',      //Wrist
        'ankle',
        'sxv0observed',
        'sxv0painint',
        'sxv0notes',
        'sxv1observed',
        'sxv1painint',
        'sxv1notes',
        'sxv2observed',
        'sxv2painint',
        'sxv2notes',
        'sxv3observed',
        'sxv3painint',
        'sxv3notes',   //ankle
        'knee',
        'sv0observed',
        'sv0painint',
        'sv0notes',
        'sv1observed',
        'sv1painint',
        'sv1notes',  //knee
        'foot',
        'ev0observed',
        'ev0painint',
        'ev0notes',
        'ev1observed',
        'ev1painint',
        'ev1notes',      //foot
        'hip_rom',
        'nv0observed',
        'nv0painint',
        'nv0notes',
        'nv1observed',
        'nv1painint',
        'nv1notes',
        'nv2observed',
        'nv2painint',
        'nv2notes',
        'nv3observed',
        'nv3painint',
        'nv3notes',
        'nv4observed',
        'nv4painint',
        'nv4notes',
        'nv5observed',
        'nv5painint',
        'nv5notes',     //hip rom
        'elbow',
        'elv0observed',
        'elv0painint',
        'elv0notes',
        'elv1observed',
        'elv1painint',
        'elv1notes',
        'elv2observed',
        'elv2painint',
        'elv2notes',
        'elv3observed',
        'elv3painint',
        'elv3notes',
        'headleft ',
        'headright',
        'shoulderleft',
        'shoulderright',
        'iliumleft',
        'iliumright',
        'footleft' ,
        'footright',
        'generalleft',
        'generalright',
        'thoraxleft',
        'thoraxright',
        'pelvisleft',
        'pelvisright',
        'kneeleft',
        'kneeright',
        'trunkleft',
        'trunkright',
        'neckleft' ,
        'neckright',
        'lumbarleft',
        'lumbarright'
    ];

}
