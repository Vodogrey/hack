<?php

function top_N($id_contests,$cnt){
    $query = "select CALL_CALLS, cnt
from (select idout_call, ACCEPTED_QSOS, count(*) as cnt
from qsos
where ACCEPTED_QSOS = '1'
group by idout_call) tbl1
inner join cals ON tbl1.idout_call = cals.ID_CALLS
order by cnt desc
LIMIT $cnt
";
    $result = mysql_query($id_contests, $query);

    if(!$result)
        die (mysql_error($id_contests));

    return $result;
//полностью передается готовая сартировка данных регулируется LIMITом, в него передается входной параметр $cnt
}

function last_N($idout_calls,$cnt){
    $query = "
    select dateq, call_in, call_out, BAND_BANDS, NAME_MODS, NAME_CONTESTS, RSTIN_QSOS, RST_OUT_QSOS, NRIN_QSOS, NROUT_QSOS, ACCEPTED_QSOS 
from(select dateconnect_qsos as dateq, idout_call as idout, call_in, call_out, BAND_BANDS, NAME_MODS, NAME_CONTESTS 
from (select dateconnect_qsos, idout_call, call_in, call_out, BAND_BANDS, NAME_MODS, id_contest 
from (select dateconnect_qsos, idout_call, call_in, call_out, id_band, NAME_MODS, id_contest 
from (select dateconnect_qsos, idout_call, call_in, call_calls as call_out, id_band, id_mod, id_contest 
from (select dateconnect_qsos, idin_call, idout_call, call_calls as call_in, id_band, id_mod, id_contest 
from (select dateconnect_qsos, idin_call, idout_call, id_band, id_mod, id_contest 
from qsos) tbl1 
inner join cals ON tbl1.idin_call = cals.ID_CALLS) tbl2 
inner join cals ON tbl2.idout_call = cals.ID_CALLS) tbl3 
inner join mods ON tbl3.id_mod = mods.id_mods) tbl4 
inner join bands on tbl4.id_band = bands.ID_BANDS) tbl5 
inner join contests on tbl5.id_contest = contests.ID_CONTESTS) tbl6 
inner join qsos on tbl6.dateq = qsos.DATECONNECT_QSOS 
where idout = '242' 
order by nrout_qsos
";
    $result = mysql_query($query);

    if(!$result)
        die (mysql_error($idout_calls));



    return $result;

}
?>

