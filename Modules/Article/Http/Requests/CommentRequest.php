<?php

namespace Modules\Article\Http\Requests;

use App\Http\Requests\AbstractRequest;

class CommentRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'comment' => 'required',
            'article_id' => 'required|exists:articles,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
