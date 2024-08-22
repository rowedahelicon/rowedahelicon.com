<?php

function bands()
{
    $music = array();
    $music['ochre'] = array('title' => 'Ochre', 'url' => 'https://ochre.bandcamp.com/');
    $music['tallyhall'] = array('title' => 'Tally Hall', 'url' => 'https://en.wikipedia.org/wiki/Tally_Hall');
    $music['pomplamoose'] = array('title' => 'Pomplamoose', 'url' => 'https://www.pomplamoose.com/');
    $music['talkingheads'] = array('title' => 'Talking Heads', 'url' => 'https://en.wikipedia.org/wiki/Talking_Heads');
    $music['thebeatles'] = array('title' => 'The Beatles', 'url' => 'https://en.wikipedia.org/wiki/The_Beatles');
    $music['thecorrespondents'] = array('title' => 'The Correspondents', 'url' => 'https://en.wikipedia.org/wiki/The_Correspondents_(band)');
    $music['franzferdinand'] = array('title' => 'Franz Ferdinand', 'url' => 'https://franzferdinand.com/');
    $music['calle13'] = array('title' => 'Calle 13', 'url' => 'https://en.wikipedia.org/wiki/Calle_13_(band)');
    $music['animalcollective'] = array('title' => 'Animal Collective', 'url' => 'https://home.myanimalhome.net/#/');
    $music['stellardrone'] = array('title' => 'Stellardrone', 'url' => 'https://stellardrone.bandcamp.com/');
    $music['daftpunk'] = array('title' => 'Daft Punk', 'url' => 'https://www.daftpunk.com/');
    $music['radiohead'] = array('title' => 'Radiohead', 'url' => 'https://radiohead.com/');
    $music['musicalmiracle'] = array('title' => 'ミラクルミュージカル', 'url' => 'https://www.hawaiipartii.com/');
    $music['lowroar'] = array('title' => 'Low Roar', 'url' => 'http://www.lowroarmusic.com/');
    $music['plaid'] = array('title' => 'Plaid', 'url' => 'https://plaid.warp.net/');
    $music['theohhellos'] = array('title' => 'The Oh Hellos', 'url' => 'https://theohhellos.com/');
    $music['nineinchnails'] = array('title' => 'Nine Inch Nails', 'url' => 'https://www.nin.com/');
    $music['caravanpalace'] = array('title' => 'Caravan Palace', 'url' => 'https://www.caravanpalace.com/');
    $music['midnightjuggernauts'] = array('title' => 'Midnight Juggernauts', 'url' => 'https://en.wikipedia.org/wiki/Midnight_Juggernauts');
    $music['machinegirl'] = array('title' => 'Machine Girl', 'url' => 'https://machin3gir1.com/');
    $music['multi-panel'] = array('title' => 'Multi-Panel', 'url' => 'https://www.multi-panel.nl/');
    $music['quindar'] = array('title' => 'Quindar', 'url' => 'https://quindar.net/');
    $music['röyksopp'] = array('title' => 'Röyksopp', 'url' => 'https://en.wikipedia.org/wiki/R%C3%B6yksopp');
    $music['sigurros'] = array('title' => 'Sigur Ros', 'url' => 'https://sigurros.com/');
    $music['thebluemangroup'] = array('title' => 'The Blue Man group', 'url' => 'https://www.blueman.com/');
    $music['thechemicalbrothers'] = array('title' => 'The Chemical Brothers', 'url' => 'https://www.thechemicalbrothers.com/');
    $music['therealtuesdayweld'] = array('title' => 'The Real Tuesday Weld', 'url' => 'https://therealtuesdayweld.bandcamp.com/');
    $music['zynthetic'] = array('title' => 'zYnthetic', 'url' => 'https://zynthetic.bandcamp.com/');
    $music['chelmico'] = array('title' => 'Chelmico', 'url' => 'https://en.wikipedia.org/wiki/Chelmico');
    $music['theblastingcompany'] = array('title' => 'The Blasting Company', 'url' => 'https://www.blastingcompany.com/');
    $music['aivisurasshu'] = array('title' => 'Aivi & Surasshu', 'url' => 'https://aivisura.com/');
    $music['silvagunner'] = array('title' => 'SilvaGunner', 'url' => 'https://highquality.rip/');
    $music['theprodigy'] = array('title' => 'The Prodigy', 'url' => 'https://en.wikipedia.org/wiki/The_Prodigy');
    $music['noisia'] = array('title' => 'Noisia', 'url' => 'https://www.noisia.nl/');
    $music['matrixfuturebound'] = array('title' => 'Matrix & Futurebound', 'url' => 'https://en.wikipedia.org/wiki/Matrix_%26_Futurebound');
    $music['stantonwarriors'] = array('title' => 'Stanton Warriors', 'url' => 'https://stantonwarriors.com/');
    $music['kraftwerk'] = array('title' => 'Kraftwerk', 'url' => 'https://kraftwerk.com/');
    $music['thefuturesoundoflondon'] = array('title' => 'The Future Sound of London', 'url' => 'http://www.futuresoundoflondon.com/');
    //$music[''] = array('title' => '', 'url' => '');

    ksort($music);
    $str = "";
    foreach ($music as $k => $v)
    {
        $str = $str.'<li>'.(!empty($v['url']) ? '<a href="'.$v['url'].'">'.$v['title'].'</a>' : $v['title']).'</li>';
    }

    return $str;
} 