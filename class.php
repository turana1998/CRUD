<?php 

class CRUD{

    public function Select()
    {
       global $db;
       $slc = $db->prepare("SELECT * FROM isciler");
       $slc->execute();
       return $slc->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Insert($post)
    {
        global $db;
        $ins = $db->prepare("INSERT into isciler set

            AdSoyad=:y,
            Vezife=:kreslo,
            Maas=:M,
            email=:mail,
            av=:av,
            qeyd_tarixi=:tarix,
            haqqinda=:about

        ");
        $x = $ins->execute([
            'y'=>$post["x"],
            'kreslo'=>$post["vezife"],
            'M'=>$post["maas"],
            'mail'=>$post["email"],
            'av'=>$post["av"],
            'tarix'=>date("Y-m-d H:i:s"),
            'about'=>$post["haqqinda"]
        ]);

        return $x ? 1 : 0;
    }

    public function Delete($id)
    {
        global $db;
        $dlt = $db->prepare("DELETE from isciler where id={$id}");
        return $dlt->execute() ? 1 : 0;
    }

}