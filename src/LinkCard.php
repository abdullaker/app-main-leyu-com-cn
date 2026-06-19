<?php

class LinkCard
{
    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'url' => 'https://app-main-leyu.com.cn',
            'title' => '乐鱼体育',
            'description' => '乐鱼体育官方平台，提供丰富的体育赛事和娱乐体验。',
            'image' => '',
            'theme' => 'light',
        ], $config);
    }

    public function render(): string
    {
        $url = htmlspecialchars($this->config['url'], ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($this->config['title'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($this->config['description'], ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars($this->config['image'], ENT_QUOTES, 'UTF-8');
        $theme = $this->config['theme'] === 'dark' ? 'dark' : 'light';

        $html = '<div class="link-card link-card--' . $theme . '">';
        $html .= '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="link-card__link">';
        
        if (!empty($image)) {
            $html .= '<div class="link-card__image-wrapper">';
            $html .= '<img src="' . $image . '" alt="' . $title . '" class="link-card__image">';
            $html .= '</div>';
        }
        
        $html .= '<div class="link-card__content">';
        $html .= '<h3 class="link-card__title">' . $title . '</h3>';
        $html .= '<p class="link-card__description">' . $description . '</p>';
        $html .= '<span class="link-card__url">' . $url . '</span>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }

    public function setUrl(string $url): self
    {
        $this->config['url'] = $url;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->config['title'] = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->config['description'] = $description;
        return $this;
    }

    public function setImage(string $image): self
    {
        $this->config['image'] = $image;
        return $this;
    }

    public function setTheme(string $theme): self
    {
        $this->config['theme'] = $theme;
        return $this;
    }

    public function getConfig(): array
    {
        return $this->config;
    }

    public static function renderDefault(): string
    {
        $card = new self();
        return $card->render();
    }

    public static function renderWithCustom(string $url, string $title, string $description = '', string $image = ''): string
    {
        $card = new self([
            'url' => $url,
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ]);
        return $card->render();
    }
}

function render_link_card(string $url = 'https://app-main-leyu.com.cn', string $title = '乐鱼体育', string $description = '乐鱼体育官方平台，提供丰富的体育赛事和娱乐体验。', string $image = '', string $theme = 'light'): string
{
    $card = new LinkCard([
        'url' => $url,
        'title' => $title,
        'description' => $description,
        'image' => $image,
        'theme' => $theme,
    ]);
    return $card->render();
}