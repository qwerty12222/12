import telebot
from telebot import types
from datetime import datetime

API_TOKEN = '7560239477:AAH7h_VfS6O8RL2IlqO4_6pbNE65lLurGoU'

bot = telebot.TeleBot(API_TOKEN)

# Testlar uchun saqlash strukturasi
tests = {}
user_tests = {}
user_files = {}
users = {}

def generate_test_code():
    return str(len(tests) + 1)

@bot.message_handler(commands=['start'])
def send_welcome(message):
    user_id = message.from_user.id
    if user_id not in users:
        msg = bot.send_message(message.chat.id, "Ismingiz va familiyangizni kiriting (masalan, John Doe):")
        bot.register_next_step_handler(msg, process_full_name)
    else:
        send_main_menu(message)

def process_full_name(message):
    try:
        full_name = message.text
        user_id = message.from_user.id
        users[user_id] = {'full_name': full_name}
        bot.send_message(message.chat.id, f"Raxmat, {full_name}. Endi asosiy menyuga o'tishingiz mumkin.")
        send_main_menu(message)
    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")
        send_welcome(message)


def send_main_menu(message):
    markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
    
    item2 = types.KeyboardButton("📝 Test tayyorlash")
    item3 = types.KeyboardButton("✔️ Javoblarni tekshirish")
    
    
    

    markup.add( item2, item3)

    bot.send_message(message.chat.id, "Asosiy menyuga xush kelibsiz!", reply_markup=markup)

# Test tayyorlash tugmasi
@bot.message_handler(regexp="📝 Test tayyorlash")
def create_test(message):
    markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
    item1 = types.KeyboardButton("🔹 Oddiy test")
    item2 = types.KeyboardButton("🔹 Fanli test")
    item3 = types.KeyboardButton("🔹 Maxsus test")
    item4 = types.KeyboardButton("🔹 Blok test")
    item5 = types.KeyboardButton("🔙 Orqaga")

    markup.add(item1, item2, item3, item4, item5)

    bot.send_message(message.chat.id, "Test tayyorlash bo'limiga xush kelibsiz!", reply_markup=markup)

# Orqaga tugmasi
@bot.message_handler(regexp="🔙 Orqaga")
def back_to_main_menu(message):
    send_main_menu(message)

# Oddiy test yaratish tugmasi
@bot.message_handler(regexp="🔹 Oddiy test")
def ordinary_test(message):
    msg = bot.send_message(message.chat.id, "Oddiy test yaratish uchun savollar soni va javoblarni kiriting (masalan, 1a2b3a4a5c yoki abcd):")
    bot.register_next_step_handler(msg, process_test_creation)

def process_test_creation(message):
    try:
        test_data = message.text.lower()  # Kichik harflarga o'tkazish
        # Formatni aniqlash
        if all(char.isdigit() for char in test_data[::2]):
            # 1a2b3c format
            questions_answers = [(int(test_data[i]), test_data[i+1]) for i in range(0, len(test_data), 2)]
        else:
            # abcd format
            questions_answers = [(i + 1, test_data[i]) for i in range(len(test_data))]

        test_code = generate_test_code()
        test_author = users[message.from_user.id]['full_name']

        test_date = datetime.now().strftime("%d.%m.%Y %H:%M")

        tests[test_code] = {
            'author_id': message.from_user.id,
            'author': test_author,
            'questions_answers': questions_answers,
            'date': test_date,
            'participants': {}
        }

        response = f"✅ Test bazaga qo'shildi.\n👨‍🏫 Muallif: {test_author}\n✍️ Test kodi: {test_code}\n🔹 Savollar: {len(questions_answers)} ta\n📆 {test_date}"
        bot.send_message(message.chat.id, response)

    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")


# Fanli test yaratish tugmasi
@bot.message_handler(regexp="🔹 Fanli test")
def subject_test(message):
    msg = bot.send_message(message.chat.id, "Fanli test yaratish uchun fan nomini kiriting:")
    bot.register_next_step_handler(msg, process_subject_name)

def process_subject_name(message):
    subject_name = message.text
    msg = bot.send_message(message.chat.id, f"Fan nomi: {subject_name}\nEndi savollar soni va javoblarni kiriting (masalan, 1a2b3a4a5c yoki abcd):")
    bot.register_next_step_handler(msg, lambda m: process_subject_test_creation(m, subject_name))

def process_subject_test_creation(message, subject_name):
    try:
        test_data = message.text
        # Formatni aniqlash
        if all(char.isdigit() for char in test_data[::2]):
            # 1a2b3c format
            questions_answers = [(int(test_data[i]), test_data[i+1]) for i in range(0, len(test_data), 2)]
        else:
            # abcd format
            questions_answers = [(i + 1, test_data[i]) for i in range(len(test_data))]

        test_code = generate_test_code()
        test_author = users[message.from_user.id]['full_name']
        test_date = datetime.now().strftime("%d.%m.%Y %H:%M")

        tests[test_code] = {
            'author_id': message.from_user.id,
            'author': test_author,
            'subject': subject_name,
            'questions_answers': questions_answers,
            'date': test_date,
            'participants': {}
        }

        response = f"✅ Test bazaga qo'shildi.\n👨‍🏫 Muallif: {test_author}\n📚 Fan nomi: {subject_name}\n✍️ Test kodi: {test_code}\n🔹 Savollar: {len(questions_answers)} ta\n📆 {test_date}"
        bot.send_message(message.chat.id, response)

    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")

# Maxsus test yaratish tugmasi
@bot.message_handler(regexp="🔹 Maxsus test")
def special_test(message):
    msg = bot.send_message(message.chat.id, "✍️ Faylni yuboring.\n❗️ Rasm yoki fayl bo'lishi mumkun.")
    bot.register_next_step_handler(msg, handle_file_upload)

def handle_file_upload(message):
    try:
        user_id = message.from_user.id
        if user_id not in user_files:
            user_files[user_id] = []

        if message.content_type in ['photo', 'document']:
            if message.content_type == 'photo':
                file_id = message.photo[-1].file_id
                file_type = 'photo'
            else:
                file_id = message.document.file_id
                file_type = 'document'

            user_files[user_id].append({'file_id': file_id, 'file_type': file_type})
            file_count = len(user_files[user_id])
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            item_continue = types.KeyboardButton("✅ Davom etish")
            item_back = types.KeyboardButton("🔙 Orqaga")
            markup.add(item_continue, item_back)

            bot.send_message(message.chat.id, f"✍️ Fayl yuborishda davom etishingiz mumkin yoki keyingi bosqichga o'tish uchun '✅ Davom etish' tugmasini bosing.\n\n🗂 Fayllar soni: {file_count} ta", reply_markup=markup)
            bot.register_next_step_handler(message, handle_file_upload)
        elif message.text == "✅ Davom etish":
            file_count = len(user_files[user_id])
            bot.send_message(message.chat.id, f"🗂 Fayllar: {file_count} ta\n\n✍️ Test javoblarini yuboring:\nM-n: abcd... yoki 1a2b3c4d...\n❕ Javoblar faqat lotin alifbosida bo'lishi shart.")
            bot.register_next_step_handler(message, lambda m: process_special_test_creation(m, user_id))
        else:
            bot.send_message(message.chat.id, "Iltimos, rasm yoki faylni yuboring yoki '✅ Davom etish' tugmasini bosing.")
            bot.register_next_step_handler(message, handle_file_upload)
    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")

def process_special_test_creation(message, user_id):
    try:
        test_data = message.text
        # Formatni aniqlash
        if all(char.isdigit() for char in test_data[::2]):
            # 1a2b3c format
            questions_answers = [(int(test_data[i]), test_data[i+1]) for i in range(0, len(test_data), 2)]
        else:
            # abcd format
            questions_answers = [(i + 1, test_data[i]) for i in range(len(test_data))]

        test_code = generate_test_code()
        test_author = users[message.from_user.id]['full_name']
        test_date = datetime.now().strftime("%d.%m.%Y %H:%M")
        file_count = len(user_files[user_id])

        tests[test_code] = {
            'author_id': message.from_user.id,
            'author': test_author,
            'questions_answers': questions_answers,
            'files': user_files[user_id],
            'date': test_date,
            'participants': {}
        }

        response = f"✅ Test bazaga qo'shildi.\n👨‍🏫 Muallif: {test_author}\n✍️ Test kodi: {test_code}\n🗂 Fayllar: {file_count} ta\n🔹 Savollar: {len(questions_answers)} ta\n📆 {test_date}"
        bot.send_message(message.chat.id, response)
    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")

# Blok test yaratish tugmasi


# Javoblarni tekshirish tugmasi
@bot.message_handler(regexp="✔️ Javoblarni tekshirish")
def check_answers(message):
    msg = bot.send_message(message.chat.id, "Test kodini kiriting:")
    bot.register_next_step_handler(msg, process_test_code)

def process_test_code(message):
    test_code = message.text
    if test_code in tests:
        test = tests[test_code]
        test_date = datetime.now().strftime("%d.%m.%Y %H:%M")
        msg = bot.send_message(message.chat.id, f"Test kodi: {test_code}\nSavollar: {len(test['questions_answers'])} ta\n\nJavoblarni kiriting (masalan, 1a2b3a4a5c yoki abcd):")
        bot.register_next_step_handler(msg, lambda m: evaluate_test(m, test_code, test_date))
        # Test fayllarini yuborish
        if 'files' in test:
            for file in test['files']:
                if file['file_type'] == 'photo':
                    bot.send_photo(message.chat.id, file['file_id'])
                else:
                    bot.send_document(message.chat.id, file['file_id'])
    else:
        bot.send_message(message.chat.id, "Bunday test kodi mavjud emas.")
        check_answers(message)


def evaluate_test(message, test_code, test_date):
    try:
        user_id = message.from_user.id
        user_name = users[message.from_user.id]['full_name']
        test_data = message.text.lower()  # Kichik harflarga o'tkazish
        test = tests[test_code]

        if all(char.isdigit() for char in test_data[::2]):
            user_answers = [(int(test_data[i]), test_data[i+1]) for i in range(0, len(test_data), 2)]
        else:
            user_answers = [(i + 1, test_data[i]) for i in range(len(test_data))]

        correct_count = sum(1 for (q, a), (uq, ua) in zip(test['questions_answers'], user_answers) if q == uq and a == ua)
        total_questions = len(test['questions_answers'])
        score = (correct_count / total_questions) * 100

        test['participants'][user_id] = {
            'name': user_name,
            'correct': correct_count,
            'total': total_questions,
            'score': score
        }

        result_message = (f"✅ Natija: {correct_count} ta\n"
                          f"🎯 Sifat darajasi: {score}%\n"
                          f"⏱️ {test_date}")

        # Test egasiga xabar
        author_id = test['author_id']
        notification_message = (f"{test_code} kodli blok testda {user_name} qatnashdi!\n"
                                f"{result_message}\n")

        inline_markup = types.InlineKeyboardMarkup()
        inline_markup.add(types.InlineKeyboardButton("Holat", callback_data=f"status_{test_code}"),
                          types.InlineKeyboardButton("Yakunlash", callback_data=f"finish_{test_code}"))

        bot.send_message(author_id, notification_message, reply_markup=inline_markup)

        # Foydalanuvchiga natija
        bot.send_message(message.chat.id, result_message)

    except Exception as e:
        bot.send_message(message.chat.id, f"Xato yuz berdi: {e}")


@bot.callback_query_handler(func=lambda call: call.data.startswith("status_") or call.data.startswith("finish_"))
def handle_inline_buttons(call):
    try:
        action, test_code = call.data.split('_')
        test = tests.get(test_code)

        if not test:
            bot.send_message(call.message.chat.id, "Bunday test kodi mavjud emas.")
            return

        if action == "status":
            participants = test['participants']
            if not participants:
                bot.send_message(call.message.chat.id, "Hali hech kim testni ishlamagan.")
                return

            participants_list = "\n".join([f"{i + 1}. {p['name']} - {p['correct']} ta ({p['score']}%)"
                                           for i, p in enumerate(participants.values())])

            report_message = (f"📌 Test kodi: {test_code}\n"
                              f"👨 Qatnashchilar soni: {len(participants)} ta\n"
                              f"🎗 Top qatnashchilar:\n"
                              f"{participants_list}")

            bot.send_message(call.message.chat.id, report_message)

        elif action == "finish":
            participants = test['participants']
            if not participants:
                bot.send_message(call.message.chat.id, "Hali hech kim testni ishlamagan.")
                return

            participants_list = "\n".join([f"{i + 1}. {p['name']} - {p['correct']} ta ({p['score']}%) 🥇"
                                           for i, p in enumerate(participants.values())])

            final_message = (f"💡 Test yakunlandi!\n"
                             f"🔰 Test kodi: {test_code}\n"
                             f"👨 Test qatnashchilari: {len(participants)} ta\n"
                             f"📝 Kalitlar: {' '.join([f'{q} - {a}' for q, a in test['questions_answers']])}\n\n"
                             f"{participants_list}")

            # Test egasiga yakuniy hisobot
            bot.send_message(call.message.chat.id, final_message)

            # Test qatnashchilariga xabar
            for participant_id in participants.keys():
                bot.send_message(participant_id, final_message)

            # Testni o'chirish
            del tests[test_code]

    except Exception as e:
        bot.send_message(call.message.chat.id, f"Xato yuz berdi: {e}")

bot.polling(none_stop=True)