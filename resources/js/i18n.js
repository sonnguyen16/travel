import { createI18n } from 'vue-i18n';

// Import các file ngôn ngữ
import en from './locales/en.json';
import vi from './locales/vi.json';
import ko from './locales/ko.json';

// Tạo cấu hình i18n
const i18n = createI18n({
    locale: 'vi', // Ngôn ngữ mặc định
    fallbackLocale: 'en', // Sử dụng tiếng Anh nếu không có bản dịch
    messages: {
        en,
        vi,
        ko,
    },
});

export default i18n;
