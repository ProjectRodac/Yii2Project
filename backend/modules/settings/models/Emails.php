<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property integer $id
 * @property string $reciever_name
 * @property string $reciever_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reciever_name', 'reciever_email', 'subject', 'content', 'attachment'], 'required'],
            [['content'], 'string'],
            [['reciever_name'], 'string', 'max' => 50],
            [['reciever_email'], 'string', 'max' => 100],
            [['subject', 'attachment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reciever_name' => 'Reciever Name',
            'reciever_email' => 'Reciever Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachment' => 'Attachment',
        ];
    }
}
