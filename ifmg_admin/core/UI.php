<?php
/**
 * UI Component Helpers
 */

class UI
{
    public static function card($title, $content, $actions = "")
    {
        return "
        <div class='bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden admin-card'>
            <div class='px-8 py-5 border-b border-gray-50 flex items-center justify-between'>
                <h3 class='font-bold text-gray-900'>$title</h3>
                <div class='flex items-center gap-2'>$actions</div>
            </div>
            <div class='p-8'>
                $content
            </div>
        </div>";
    }

    public static function table($headers, $rows)
    {
        $html = "
        <div class='overflow-x-auto'>
            <table class='w-full text-left'>
                <thead>
                    <tr class='border-b border-gray-100'>";
        foreach ($headers as $header) {
            $html .= "<th class='px-6 py-4 text-[11px] font-bold text-gray-400 uppercase tracking-widest'>$header</th>";
        }
        $html .= "</tr></thead><tbody class='divide-y divide-gray-50'>";
        foreach ($rows as $row) {
            $html .= "<tr>";
            foreach ($row as $cell) {
                $html .= "<td class='px-6 py-4 text-sm text-gray-600'>$cell</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</tbody></table></div>";
        return $html;
    }

    public static function badge($text, $type = "info")
    {
        $colors = [
            'success' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
            'warning' => 'bg-gold-50 text-gold-600 border-gold-100',
            'error' => 'bg-red-50 text-red-600 border-red-100',
            'info' => 'bg-teal-50 text-teal-600 border-teal-100'
        ];
        $color = $colors[$type] ?? $colors['info'];
        return "<span class='px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider border $color'>$text</span>";
    }

    public static function input($name, $label, $type = "text", $value = "", $placeholder = "", $required = false)
    {
        $reqAttr = $required ? "required" : "";
        return "
        <div class='space-y-2'>
            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>$label</label>
            <input type='$type' name='$name' value='$value' placeholder='$placeholder' $reqAttr
                class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
        </div>";
    }

    public static function textarea($name, $label, $value = "", $placeholder = "", $rows = 4, $required = false)
    {
        $reqAttr = $required ? "required" : "";
        return "
        <div class='space-y-2'>
            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>$label</label>
            <textarea name='$name' placeholder='$placeholder' rows='$rows' $reqAttr
                class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>$value</textarea>
        </div>";
    }

    public static function bilingualInput($name, $label, $values = [], $required = false)
    {
        $valEn = $values['en'] ?? '';
        $valSo = $values['so'] ?? '';
        $reqAttr = $required ? "required" : "";

        return "
        <div class='space-y-3 p-6 bg-gray-50/50 rounded-2xl border border-gray-100'>
            <div class='flex items-center justify-between mb-1'>
                <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>$label</label>
                <div class='flex bg-gray-200 p-0.5 rounded-lg text-[10px] font-bold uppercase'>
                    <button type='button' class='lang-tab-btn px-2 py-1 rounded-md bg-white text-navy-900 shadow-sm active' data-lang='en'>EN</button>
                    <button type='button' class='lang-tab-btn px-2 py-1 rounded-md text-gray-400' data-lang='so'>SO</button>
                </div>
            </div>
            <div class='lang-field-container' data-lang='en'>
                <input type='text' name='{$name}_en' value='$valEn' placeholder='English version...' $reqAttr
                    class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
            </div>
            <div class='lang-field-container hidden' data-lang='so'>
                <input type='text' name='{$name}_so' value='$valSo' placeholder='Nooca Soomaaliga...'
                    class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
            </div>
        </div>";
    }

    public static function bilingualTextarea($name, $label, $values = [], $required = false, $rows = 4, $wysiwyg = false)
    {
        $valEn = $values['en'] ?? '';
        $valSo = $values['so'] ?? '';
        $reqAttr = $required ? "required" : "";
        $editorEn = $wysiwyg ? "<div class='wysiwyg-editor' style='min-height: " . ($rows * 1.5) . "em'></div>" : "";
        $editorSo = $wysiwyg ? "<div class='wysiwyg-editor' style='min-height: " . ($rows * 1.5) . "em'></div>" : "";
        $hiddenClass = $wysiwyg ? " style='display:none'" : "";

        return "
    <div class='space-y-3 p-6 bg-gray-50/50 rounded-2xl border border-gray-100'>
        <div class='flex items-center justify-between mb-1'>
            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>$label</label>
            <div class='flex bg-gray-200 p-0.5 rounded-lg text-[10px] font-bold uppercase'>
                <button type='button' class='lang-tab-btn px-2 py-1 rounded-md bg-white text-navy-900 shadow-sm active' data-lang='en'>EN</button>
                <button type='button' class='lang-tab-btn px-2 py-1 rounded-md text-gray-400' data-lang='so'>SO</button>
            </div>
        </div>
        <div class='lang-field-container' data-lang='en'>
            <textarea name='{$name}_en' placeholder='English version...' rows='$rows' $reqAttr
                class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'$hiddenClass>$valEn</textarea>
            $editorEn
        </div>
        <div class='lang-field-container hidden' data-lang='so'>
            <textarea name='{$name}_so' placeholder='Nooca Soomaaliga...' rows='$rows'
                class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'$hiddenClass>$valSo</textarea>
            $editorSo
        </div>
    </div>";
    }

    public static function modal($id, $title, $content, $footer = "")
    {
        return "
        <div id='$id' class='hidden fixed inset-0 z-50 overflow-y-auto' aria-labelledby='modal-title' role='dialog' aria-modal='true'>
            <div class='flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0'>
                <div class='fixed inset-0 bg-navy-950/40 backdrop-blur-sm transition-opacity' aria-hidden='true'></div>
                <span class='hidden sm:inline-block sm:align-middle sm:h-screen' aria-hidden='true'>&#8203;</span>
                <div class='inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-white/20'>
                    <div class='px-8 py-6 border-b border-gray-50 flex items-center justify-between'>
                        <h3 class='text-xl font-bold text-navy-900' id='modal-title'>$title</h3>
                        <button type='button' class='close-modal text-gray-400 hover:text-gray-600 transition-all'>
                            <svg class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'></path></svg>
                        </button>
                    </div>
                    <div class='px-8 py-8'>
                        $content
                    </div>
                    <div class='px-8 py-6 bg-gray-50 flex flex-row-reverse gap-3'>
                        $footer
                        <button type='button' class='close-modal px-6 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-bold text-gray-500 hover:bg-gray-100 transition-all'>Cancel</button>
                    </div>
                </div>
            </div>
        </div>";
    }
}
