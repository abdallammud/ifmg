<div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#0B2E4F] mb-2">Welcome Back</h1>
        <p class="text-gray-500">Sign in to manage IFMG content</p>
    </div>

    <?php include VIEW_PATH . 'partials/alerts.php'; ?>

    <form action="<?php echo url('login'); ?>" method="POST" id="loginForm" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
            <input type="text" name="username" required
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0F6E8C] focus:ring-2 focus:ring-[#0F6E8C]/20 outline-none transition-all">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0F6E8C] focus:ring-2 focus:ring-[#0F6E8C]/20 outline-none transition-all">
        </div>
        <button type="submit"
            class="w-full py-4 bg-gradient-to-r from-[#C9A227] to-[#D4B23A] text-[#0B2E4F] font-bold rounded-xl shadow-lg shadow-gold-200 hover:scale-[1.02] active:scale-95 transition-all">
            Log In
        </button>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Add basic jQuery validation or interaction if needed
    });
</script>