<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Add New User</h1>
            <p class="text-gray-500 mt-1 font-medium">Create a new administrator account.</p>
        </div>
    </div>

    <form action="<?php echo url('users/store'); ?>" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Account Basics", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('full_name', 'Full Name', 'text', '', 'e.g. John Doe', true) . "
                        " . UI::input('username', 'Username', 'text', '', 'e.g. jdoe', true) . "
                        " . UI::input('email', 'Email Address', 'email', '', 'e.g. jdoe@ifmg.gov.so', true) . "
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Role</label>
                            <select name='role' class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                <option value='editor'>Content Editor</option>
                                <option value='admin'>Administrator</option>
                                <option value='super_admin'>Super Admin</option>
                            </select>
                        </div>
                    </div>
                "); ?>

                <?php echo UI::card("Security", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('password', 'Password', 'password', '', '••••••••', true) . "
                        " . UI::input('password_confirm', 'Confirm Password', 'password', '', '••••••••', true) . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Create Account
                    </button>
                    <a href="<?php echo url('users'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>