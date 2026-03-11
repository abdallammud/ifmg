<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Edit User</h1>
            <p class="text-gray-500 mt-1 font-medium">Update account settings for
                <?php echo e($user['username']); ?>.
            </p>
        </div>
    </div>

    <form action="<?php echo url('users/update/' . $user['id']); ?>" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Account Basics", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('full_name', 'Full Name', 'text', $user['full_name'], '', true) . "
                        " . UI::input('username', 'Username', 'text', $user['username'], '', true) . "
                        " . UI::input('email', 'Email Address', 'email', $user['email'], '', true) . "
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Role</label>
                            <select name='role' class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                <option value='editor' " . ($user['role'] == 'editor' ? 'selected' : '') . ">Content Editor</option>
                                <option value='admin' " . ($user['role'] == 'admin' ? 'selected' : '') . ">Administrator</option>
                                <option value='super_admin' " . ($user['role'] == 'super_admin' ? 'selected' : '') . ">Super Admin</option>
                            </select>
                        </div>
                    </div>
                "); ?>

                <?php echo UI::card("Security (Leave blank to keep current)", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('password', 'New Password', 'password', '', '••••••••') . "
                        " . UI::input('password_confirm', 'Confirm New Password', 'password', '', '••••••••') . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Update Account
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