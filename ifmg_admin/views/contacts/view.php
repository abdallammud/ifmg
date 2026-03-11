<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">View Message</h1>
            <p class="text-gray-500 mt-1 font-medium">From:
                <?php echo e($message['name']); ?>
            </p>
        </div>
        <a href="<?php echo url('contacts'); ?>"
            class="px-6 py-2.5 rounded-xl bg-white border border-gray-200 text-sm font-bold text-gray-500 hover:bg-gray-100 transition-all">Back
            to Inbox</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <?php echo UI::card("Message Details", "
                <div class='space-y-6'>
                    <div>
                        <h4 class='text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1'>Subject</h4>
                        <div class='text-lg font-bold text-navy-900'>" . e($message['subject']) . "</div>
                    </div>
                    <div class='p-6 bg-gray-50 rounded-2xl border border-gray-100 text-gray-700 leading-relaxed min-h-[200px]'>
                        " . nl2br(e($message['message'])) . "
                    </div>
                </div>
            "); ?>
        </div>

        <div class="space-y-6">
            <?php echo UI::card("Sender Information", "
                <div class='space-y-4'>
                    <div>
                        <h4 class='text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1'>Full Name</h4>
                        <div class='text-sm font-bold text-navy-900'>" . e($message['name']) . "</div>
                    </div>
                    <div>
                        <h4 class='text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1'>Email Address</h4>
                        <a href='mailto:" . e($message['email']) . "' class='text-sm font-bold text-teal-600 hover:underline'>" . e($message['email']) . "</a>
                    </div>
                    <div>
                        <h4 class='text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1'>Sent Date</h4>
                        <div class='text-sm font-medium text-gray-500'>" . date('F d, Y @ H:i', strtotime($message['created_at'])) . "</div>
                    </div>
                </div>
            "); ?>

            <div class="pt-4">
                <a href='mailto:<?php echo e($message['email']); ?>?subject=Re:
                    <?php echo e($message['subject']); ?>'
                    class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 text-center block font-bold shadow-lg
                    shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                    Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>