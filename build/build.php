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

    public function build() : void
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

        return $html;
    }

    private function generate_page(string $file_name, array $settings = array()) : void
    {
        $html = file_get_contents('src/'.$this->structure['settings']['base_file']);

        //Process content
        $content = (isset($settings['content']) ? file_get_contents('src/'.$settings['content']) : '');

        preg_match_all('/{{(.*)}}/m', $content, $matches, PREG_SET_ORDER, 0);
        
        //If we have incluces, replace them
        foreach ($matches as $k => $v)
        {
            if (file_exists('src/includes/'.$v[1].'.php'))
            {
                $content = str_replace($v[0], $this->returnFileBuffer('src/includes/'.$v[1].'.php'), $content);
            }
        }

        $html = str_replace('{website_content}', $content, $html);
        $html = $this->replace_basics($html, $settings);
        
        //Replace src
        preg_match_all('/{\?(.*)}/m', $html, $matches, PREG_SET_ORDER, 0);

        foreach ($matches as $k => $v)
        {
            $match = $this->replace_basics(file_get_contents('src/'.$v[1]), $settings);
            $html = str_replace($v[0], $match, $html);
        }
        
        $this->colorLog('Building: '.$this->structure['settings']['build_location'].$file_name.'...');
        
        file_put_contents('generated/'.$file_name, $html);
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

    private function colorLog(string $str, string $type = 'i') : void
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

    private function returnFileBuffer(string $file) : string
    {
        ob_start();
        require($file);
        return ob_get_clean();
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