import { createI18n } from 'vue-i18n';

// Import các file ngôn ngữ
import en from './locales/en.json';
import vi from './locales/vi.json';
import ko from './locales/ko.json';

// Lấy ngôn ngữ từ localStorage nếu có, nếu không thì dùng 'vi' làm mặc định
const savedLocale = typeof window !== 'undefined' ? localStorage.getItem('user-locale') || 'vi' : 'vi';

// Tạo cấu hình i18n
const i18n = createI18n({
    legacy: false, // Sử dụng Composition API
    locale: savedLocale, // Sử dụng ngôn ngữ đã lưu hoặc mặc định
    fallbackLocale: 'en', // Sử dụng tiếng Anh nếu không có bản dịch
    messages: {
        en,
        vi,
        ko,
    },
});

export default i18n;
