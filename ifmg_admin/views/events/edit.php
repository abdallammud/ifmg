<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Edit Event</h1>
            <p class="text-gray-500 mt-1 font-medium">Update the event details and schedule.</p>
        </div>
    </div>

    <form action="<?php echo url('events/update/' . $event['id']); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Event Information", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Event Title', ['en' => $event['title_en'], 'so' => $event['title_so']], true) . "
                        " . UI::bilingualTextarea('description', 'Description', ['en' => $event['description_en'], 'so' => $event['description_so']], false, 4, true) . "
                        " . UI::bilingualInput('location', 'Location', ['en' => $event['location_en'], 'so' => $event['location_so']], true) . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Date & Type", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::input('event_date', 'Event Date', 'date', $event['event_date'], '', true) . "
                        <div class='grid grid-cols-2 gap-4'>
                            " . UI::input('start_time', 'Start Time', 'time', $event['start_time']) . "
                            " . UI::input('end_time', 'End Time', 'time', $event['end_time']) . "
                        </div>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Event Type</label>
                            <select name='event_type' required class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                <option value='workshop' " . ($event['event_type'] == 'workshop' ? 'selected' : '') . ">Workshop</option>
                                <option value='conference' " . ($event['event_type'] == 'conference' ? 'selected' : '') . ">Conference</option>
                                <option value='seminar' " . ($event['event_type'] == 'seminar' ? 'selected' : '') . ">Seminar</option>
                                <option value='forum' " . ($event['event_type'] == 'forum' ? 'selected' : '') . ">Forum</option>
                                <option value='other' " . ($event['event_type'] == 'other' ? 'selected' : '') . ">Other</option>
                            </select>
                        </div>
                    </div>
                "); ?>

                <?php echo UI::card("Media", "
                    <div class='grid grid-cols-1 gap-6'>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Event Image</label>
                            " . ($event['image'] ? "<img src='" . asset('uploads/' . $event['image']) . "' class='w-full h-32 object-cover rounded-xl mb-3 shadow-sm border'>" : "") . "
                            <input type='file' name='image' accept='image/*' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                        </div>
                        " . UI::input('sort_order', 'Sort Order', 'number', $event['sort_order']) . "
                    </div>
                "); ?>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Update Event
                    </button>
                    <a href="<?php echo url('events'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>