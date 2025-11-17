<?php 

namespace Classes;

class Pager {
    public $current_page;
    public $entries_per_page;
    public $total_entries;

    public function __construct($current_page = 1, $entries_per_page = 10, $total_entries = 0) {
        $this->current_page = (int) $current_page;
        $this->entries_per_page = (int) $entries_per_page;
        $this->total_entries = (int) $total_entries;
    }
    public function offset() {
        return $this->entries_per_page * ($this->current_page - 1);
    }
    public function total_pages() {
        return ceil($this->total_entries / $this->entries_per_page);
    }
    public function previous_page() {
        $previous = $this->current_page - 1;
        return ($previous > 0) ? $previous : false;
    }
    public function next_page() {
        $next = $this->current_page + 1;
        return ($next <= $this->total_pages()) ? $next : false;
    }
    public function previous_link() {
        $html = '';
        if($this->previous_page()) {
            $html .= "<a href=\"?page={$this->previous_page()}\" class=\"pager__link pager__link--text\">&laquo; Previous</a>";
        }
        return $html;
    }
    public function next_link() {
        $html = '';
        if($this->next_page()) {
            $html .= "<a href=\"?page={$this->next_page()}\" class=\"pager__link pager__link--text\">Next &raquo;</a>";
        }
        return $html;
    }
    public function pager_numbers() {
        $html = '';
        for($i = 1; $i <= $this->total_pages(); $i++) {
            if($i === $this->current_page) {
                $html .= "<span class=\"pager__link pager__link--current\">{$i}</span>";
            } else {
                $html .= "<a href=\"?page={$i}\" class=\"pager__link pager__link--number\">{$i}</a>";
            }
        }
        return $html;
    }
    public function pager() {
        $html = '';
        if($this->total_entries > 1) {
            $html .= "<div class=\"pager\">";
            $html .= $this->previous_link();
            $html .= $this->pager_numbers();
            $html .= $this->next_link();
            $html .= "</div>";
        }
        return $html;
    }
}