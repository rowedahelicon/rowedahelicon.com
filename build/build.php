<?php

class static_builder
{
    private array $structure;
  
    function __construct(string $json = 'structure.json')
    {
        $this->structure = json_decode(file_get_contents($json), TRUE);

        //General error handling
        if (!is_dir($this->structure['settings']['build_location'])) throw new Exception('Build location does not exist!');
        if (!is_writable($this->structure['settings']['build_location'])) throw new Exception('Build location cannot be written to!');
    }

    public function build()
    {
        foreach ($this->structure['pages'] as $k => $v)
        {
            $this->generate_page($k, (!empty($v['settings']) ? $v['settings'] : array()));
        }
    }

    private function replace_basics(string $html, array $settings = array()) : string
    {
        $html = str_replace('{website_url}', $this->structure['settings']['url'], $html);
        $html = str_replace('{this_page}', (isset($settings['this_page']) ? $settings['this_page'] : $this->structure['settings']['url']), $html);
        $html = str_replace('{website_title}', (isset($settings['title']) ? $settings['title']: $this->structure['settings']['title']), $html);
        $html = str_replace('{website_description}', (isset($settings['description']) ? $settings['description']: $this->structure['settings']['description']), $html);
        $html = str_replace('{website_css}', $this->generate_css(), $html);
        //Move this
        $html = str_replace('{bands}', $this->bands(), $html);
        $html = str_replace('{artists}', $this->artists(), $html);

        return $html;
    }

    private function generate_page(string $file_name, array $settings = array())
    {
        $html = file_get_contents('src/'.$this->structure['settings']['base_file']);

        $html = str_replace('{website_content}', (isset($settings['content']) ? file_get_contents('src/'.$settings['content']) : ''), $html);
        $html = $this->replace_basics($html, $settings);
        
        //Replace src
        preg_match_all('/{\?(.*)}/m', $html, $matches, PREG_SET_ORDER, 0);

        foreach ($matches as $k => $v)
        {
            $match = $this->replace_basics(file_get_contents('src/'.$v[1]), $settings);
            $html = str_replace($v[0], $match, $html);
        }
        
        $this->colorLog('Building: '.$this->structure['settings']['build_location'].$file_name.'...');
        
        //file_put_contents($this->structure['settings']['build_location'].$file_name, $html);
        file_put_contents('generated/'.$file_name, $html);
    }

    private function bands()
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
    
    private function artists()
    {
        $music = array();
        $music['thespackster'] = array('title' => 'theSpackster', 'url' => 'https://thespackster.bandcamp.com/');
        $music['andrewbird'] = array('title' => 'Andrew Bird', 'url' => 'https://en.wikipedia.org/wiki/Andrew_Bird');
        $music['coldstorage'] = array('title' => 'CoLD SToRAGE', 'url' => 'https://coldstorage.bandcamp.com/');
        $music['thestumps'] = array('title' => 'The Stumps', 'url' => 'https://thestumps.bandcamp.com/');
        $music['lemondemon'] = array('title' => 'Lemon Demon', 'url' => 'http://lemondemon.com/');
        $music['grantkirkhope'] = array('title' => 'Grant Kirkhope', 'url' => 'https://www.grantkirkhope.com/');
        $music['waneella'] = array('title' => 'Waneella', 'url' => 'https://waneella.bandcamp.com/');
        $music['michealwyckoff'] = array('title' => 'Micheal Wyckoff', 'url' => 'https://en.wikipedia.org/wiki/Michael_Wyckoff');
        $music['jackconte'] = array('title' => 'Jack Conte', 'url' => 'https://jackconte.bandcamp.com/');
        $music['tobyfox'] = array('title' => 'Toby Fox', 'url' => 'https://en.wikipedia.org/wiki/Toby_Fox');
        $music['benprunty'] = array('title' => 'Ben Prunty', 'url' => 'https://www.benpruntymusic.com/');
        $music['mikemorasky'] = array('title' => 'Mike Morasky', 'url' => 'https://en.wikipedia.org/wiki/Mike_Morasky');
        $music['kellybailey'] = array('title' => 'Kelly Bailey', 'url' => 'https://en.wikipedia.org/wiki/Kelly_Bailey_(composer)');
        $music['davidbyrne'] = array('title' => 'David Byrne', 'url' => 'https://en.wikipedia.org/wiki/David_Byrne');
        $music['phillipglass'] = array('title' => 'Phillip Glass', 'url' => 'https://en.wikipedia.org/wiki/Philip_Glass');
        $music['halleylabs'] = array('title' => 'Halley Labs', 'url' => 'https://lapfox.bandcamp.com/');
        $music['hidekinaganuma'] = array('title' => 'HIDEKI NAGANUMA', 'url' => 'https://hidekinaganuma.bandcamp.com/');
        $music['mattkresling'] = array('title' => 'Matt Kresling', 'url' => 'https://www.youtube.com/@kresling');
        $music['rikunuottajärvi'] = array('title' => 'Riku Nuottajärvi', 'url' => 'https://www.imdb.com/name/nm10150206/');
        $music['noisemaker'] = array('title' => 'Noisemaker', 'url' => 'https://noisemaster.bandcamp.com/album/funeral-ep');
        $music['gooseworx'] = array('title' => 'Gooseworx', 'url' => 'https://soundcloud.com/gooseworx');
        $music['davidbergeaud '] = array('title' => 'David Bergeaud', 'url' => 'https://www.bergeaud.com/');
        $music['professorkliq'] = array('title' => 'Professor Kliq', 'url' => 'https://www.professorkliq.com/');
        $music['pilotredsun'] = array('title' => 'PilotRedSun', 'url' => 'https://pilotredsun.bandcamp.com/');
        $music['sufjanstevens'] = array('title' => 'Sufjan Stevens', 'url' => 'https://sufjanstevens.bandcamp.com');
        $music['jonbrion'] = array('title' => 'Jon Brion', 'url' => 'https://en.wikipedia.org/wiki/Jon_Brion');
        $music['jamesshimoji'] = array('title' => 'James Shimoji', 'url' => 'https://soundcloud.com/jamesshimoji');
        $music['2mello'] = array('title' => '2 Mello', 'url' => 'https://2mello.net/');
        $music['boen'] = array('title' => 'Bo en', 'url' => 'https://bo-en.info/');
        $music['joeltumelty'] = array('title' => 'Joel Tumelty', 'url' => 'https://soundcloud.com/user-273168406');
        $music['aphextwin'] = array('title' => 'Aphex Twin', 'url' => 'https://aphextwin.warp.net/');
        $music['edu'] = array('title' => 'Edu', 'url' => 'https://adhorowi.bandcamp.com/album/sketches-3d');
        $music['robcantor'] = array('title' => 'Rob Cantor', 'url' => 'https://en.wikipedia.org/wiki/Rob_Cantor');
        $music['dandeacon'] = array('title' => 'Dan Deacon', 'url' => 'https://dandeacon.com/');
        $music['grahamkartna'] = array('title' => 'Graham Kartna', 'url' => 'https://grahamkartna.bandcamp.com/');
        $music['patriciataxxon'] = array('title' => 'Patricia Taxxon', 'url' => 'https://patriciataxxon.bandcamp.com/');
        $music['sakupen'] = array('title' => 'Sakupen', 'url' => 'https://sakupen.newgrounds.com/');
        $music['mazie'] = array('title' => 'Mazie', 'url' => 'https://www.youtube.com/channel/UC_sZC1BavshCiwQWM3pfd5g');
        $music['angelinfaure'] = array('title' => 'Angelin Faure', 'url' => 'https://soundcloud.com/angelinfaure');
        $music['courtneybarnett'] = array('title' => 'Courtney Barnett', 'url' => 'https://courtneybarnett.com.au/');
        $music['eggpriest'] = array('title' => 'EGGPRIEST', 'url' => 'https://eggpriest.bandcamp.com/');
        $music['junelalonde'] = array('title' => 'June LaLonde', 'url' => 'https://junelalonde.bandcamp.com/');
        $music['nobonoko'] = array('title' => 'Nobonoko', 'url' => 'https://nobonoko.bandcamp.com/');
        $music['rilliam'] = array('title' => 'Rilliam', 'url' => 'https://raoulwb.bandcamp.com/');
        $music['mrsauceman'] = array('title' => 'Mr. Sauceman', 'url' => 'https://x.com/mister_sauceman?lang=en');
        $music['nicolassnyder'] = array('title' => 'Nicolas Snyder', 'url' => 'https://www.nicolassnyder.com/');
        $music['nobuouematsu'] = array('title' => 'Nobuo Uematsu', 'url' => 'https://en.wikipedia.org/wiki/Nobuo_Uematsu');
        $music['joehisaishi'] = array('title' => 'Joe Hisaishi', 'url' => 'https://en.wikipedia.org/wiki/Joe_Hisaishi');
        $music['junkiexl'] = array('title' => 'Junkie XL', 'url' => 'https://tomholkenborg.com/junkie-xl');
        $music['jimmyurine'] = array('title' => 'Jimmy Urine', 'url' => 'https://www.jimmyurine.net/');
        $music['ferrycorsten'] = array('title' => 'Ferry Corsten', 'url' => 'https://www.ferrycorsten.com/');
        $music['mason'] = array('title' => 'Mason', 'url' => 'https://www.musicofmason.com/');
        $music['deadmau5'] = array('title' => 'Deadmau5', 'url' => 'https://deadmau5.com/');
        $music['djfresh'] = array('title' => 'DJ Fresh', 'url' => 'https://en.wikipedia.org/wiki/DJ_Fresh');
        //$music[''] = array('title' => '', 'url' => '');

        ksort($music);
        $str = "";
        foreach ($music as $k => $v)
        {
            $str = $str.'<li>'.(!empty($v['url']) ? '<a href="'.$v['url'].'">'.$v['title'].'</a>' : $v['title']).'</li>';
        }

        return $str;
    }

    private function generate_css()
    {
        $css = "";
        foreach ($this->structure['settings']['css'] as $k => $v)
        { 
            $css .= str_replace('#{url}', $this->structure['settings']['url'], '<link rel="stylesheet" href="'.$v.'?v='.time().'">'.PHP_EOL); 
        }

        return $css;
    }

    private function colorLog(string $str, string $type = 'i')
    {
        switch ($type) {
            case 'e': //error
                echo "\033[31m$str \033[0m\n";
            break;
            case 's': //success
                echo "\033[32m$str \033[0m\n";
            break;
            case 'w': //warning
                echo "\033[33m$str \033[0m\n";
            break;  
            case 'i': //info
                echo "\033[36m$str \033[0m\n";
            break;      
            default:
                echo "$str\n";
            break;
        }
    }
}

try
{
    echo "\033[31m( ´･ω･`) \033[0m\n";
    $builder = new static_builder();
    $builder->build();
} 
catch (Exception $e)
{
    echo $e->getMessage(), "\n";
}