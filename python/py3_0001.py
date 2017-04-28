for 老师 in range(0, 24):
    if 老师 * 3 + (24 - 老师) / 3 == 24:
        学生 = 24 - 老师
        break

print(老师, 学生)
